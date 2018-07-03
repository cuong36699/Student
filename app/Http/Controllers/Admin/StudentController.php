<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogStudent;
use App\Http\Requests\UpdateBlogStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Department;
use App\Models\User;
use App\Models\Risident;
use App\Models\Member;
use Session;
use Mail;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function contact($id)
    {   
        $data_student = Student::findOrFail($id);
        
        return view('admin/contact.create', compact('data_student'));
    }

    public function contactsend(Request $request, $id)
    {
        $data_student = Student::findOrFail($id);
        $data = $request->all();
        // dd($data);
         Mail::send('admin/mail.contact', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Laravel');
        });
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
                ->has('search') ? $request->session()->get('search') : ''));
        $student_all = Student::where('full_name', 'like', '%' . $request->session()->get('search') . '%')->paginate(4);
        if ($request->ajax()) {
            return view('admin/student.ajax', compact('student_all'));
        } else {
            return view('admin/student.index', compact('student_all'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_name = Course::pluck('course_name', 'id');
        $deparments = Department::pluck('department_name', 'id')->all();

        return view('admin/student.create', compact('course_name', 'deparments'));
    }

    public function showCourseInDepartment(Request $request)
    {
        if ($request->ajax()) {
            $courseAjax = Course::whereDepartmentId($request->department_id)->select('id', 'course_name')->get();

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
        // dd($request);
        // nhận tên thời gian image và di chuyển hình vào thư mục hình ảnh
        $image = time() . '.' . $request['avatar']->getClientOriginalName();
        request()->avatar->move(public_path('hinhanh'), $image);
        // 
        $data = $request->all();
        $data['avatar'] = $image;
        // create Student
        $st_id = Student::create($data);
        // get student id
        $data['student_id'] = $st_id->id;
        // create member
        $member_id = Member::create($data);
        // create risident
        $risident_id = Risident::create($data);
        // create course
        $new_student = Student::findOrFail($st_id->id);
        $course_id = $request->input('course_name');
        $new_student->courses()->attach($course_id);
        // 
        $user = User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['identity']),
            'student_id' => $st_id->id,
        ]);
        //
        Mail::send('admin/mail.mail', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject($data['student_id']);
        });
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
        $student = Student::with('member', 'risident')->findOrFail($id);
        // lay lop cuoi
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
        $departments = Department::pluck('department_name', 'id')->all();
        $student_edit = Student::with('member', 'risident', 'courses')->findOrFail($id);
        //  lay id lop de xuat ten khoa
        $course_id = Course::findOrFail($student_edit->courses->last()->id);

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
        $data_student = Student::findOrFail($id);
        $data_rq = $request->all();
        // 
        if ($request['avatar'] == null) {
            $data_rq['avatar'] = $data_student->avatar;
        }else{
            $image = time() . '.' . $request['avatar']->getClientOriginalName();
            request()->avatar->move(public_path('hinhanh'), $image);
            $data_rq['avatar'] = $image;
        }
        $data_student->update($data_rq);
        // update member
        $data_student->member->update($data_rq);
        // update risident
        $data_student->risident->update($data_rq);
        // lớp lấy id lớp của sv để so sánh
        $compare_course = $data_student->courses()->get()->last();
        // nếu tên nhập vs tên đã có sẵn trùng nhâu thì không cần thêm trồng lên nhâu
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
        $data = Student::findOrFail($id);
        $data->delete();
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã xóa sinh viên tên' . ' ' . $data->full_name);
        } else {
            Session::flash('ketqua', 'Deleted student' . ' ' . $data->full_name);
        }
        return redirect()->back();
    }
}
