<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogStudent;
use App\Http\Requests\UpdateBlogStudent;
use App\Repositories\Contracts\StudentRepository;
use Session;

class StudentController extends Controller
{
    protected $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
            ->has('search') ? $request->session()->get('search') : ''));
        $student_all = $this->repository->findByFieldLike('full_name', $request->session()->get('search'), 4);
        
        if ($request->ajax()) {
            return view('admin/student.ajax', compact('student_all'));
        } else {
            return view('admin/student.index', compact('student_all'));
        }
    }

    public function contact($id)
    {   
        $data_student = $this->repository->findOrFailStudent($id);
        
        return view('admin/contact.create', compact('data_student'));
    }

    public function contactsend(Request $request, $id)
    {
        $data_student = $this->repository->findOrFail($id);
        $data = $request->all();
        $sendMail = $this->repository->sendMail('admin/mail.contact', $data);
        Session::flash('ketqua', 'Đã gửi thông báo cho sinh viên' . ' ' .  $data_student['full_name']);

        return redirect()->route('student.show', $id);
    }

    public function changeLanguage($language)
    {   
        Session::put('website_language', $language);
        Session::flash('ketqua', trans('layout/text.st_flLanguage'));

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_name = $this->repository->pluckCourse('course_name', 'id');
        $deparments = $this->repository->pluckDepartment('department_name', 'id');

        return view('admin/student.create', compact('course_name', 'deparments'));
    }

    public function showCourseInDepartment(Request $request)
    {
        if ($request->ajax()) {
            $courseAjax = $this->repository->departmentShowCourse($request->department_id,['id', 'course_name']);

            return response()->json($courseAjax);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogStudent $request)
    {
        $image = time() . '.' . $request['avatar']->getClientOriginalName();
        request()->avatar->move(public_path('hinhanh'), $image);

        $data = $request->all();
        $data['avatar'] = $image;
        // create Student
        $student_id = $this->repository->studentCreate($data);
        // get student id
        $data['student_id'] = $student_id->id;
        // create member
        $member_id = $this->repository->memberCreate($data);
        // create risident
        $risident_id = $this->repository->risidentCreate($data);
        // create course
        $new_student = $this->repository->findOrFailStudent($student_id->id);
        $course_id = $request->input('course_name');
        $new_student->courses()->attach($course_id);
        // create user password
        $data['name'] = $data['full_name'];
        $data['password'] = Hash::make($data['identity']);
        $user = $this->repository->userCreate($data);
        // send mail
        $sendMail = $this->repository->sendMail('admin/mail.mail', $data);
        
        Session::flash('ketqua', trans('student/create.st_fl') . ' ' .  $data['full_name']);
        
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->repository->findWithStudent(['member', 'risident'], $id);
        // last course
        $course = $student->courses->last();

        return view('admin/student.show', compact('student', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = $this->repository->pluckDepartment('department_name', 'id');
        $student_edit = $this->repository->findWithStudent(['member', 'risident', 'courses'], $id);
        // Get id course have department
        $course_id = $this->repository->findOrFailCourse($student_edit->courses->last()->id);

        return view('admin/student.edit', compact('course_id', 'student_edit', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogStudent $request, $id)
    {
        $data_student = $this->repository->findOrFailStudent($id);
        $data_rq = $request->all();
        // Validate imgae
        if ($request['avatar'] == null) {
            $data_rq['avatar'] = $data_student->avatar;
        } else {
            $image = time() . '.' . $request['avatar']->getClientOriginalName();
            request()->avatar->move(public_path('hinhanh'), $image);
            $data_rq['avatar'] = $image;
        }
        // update student
        $data_student->update($data_rq);
        // update member
        $data_student->member->update($data_rq);
        // update risident
        $data_student->risident->update($data_rq);
        // Get id course compare
        $compare_course = $data_student->courses()->get()->last();

        if ($compare_course->id == $request['course_name']) {

        } else {
            $course_id = $request['course_name'];
            $data_student->courses()->attach($course_id);
        }

        Session::flash('ketqua', trans('student/edit.st_fl') . ' ' . $request['full_name']);

        return redirect()->route('student.show', [$data_student->id]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->findOrFailStudent($id);
        $data->delete();

        Session::flash('ketqua', 'Đã xóa sinh viên tên' . ' ' . $data->full_name);

        return redirect()->back();
    }
}
