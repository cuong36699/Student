<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogCourse;
use App\Http\Requests\UpdateBlogCourse;
use App\Models\Department;
use App\Models\Course;
use App\Models\Student;
use App\Repositories\Contracts\CourseRepository;
use Session;

class CourseController extends Controller
{
    protected $repository;

    public function __construct(CourseRepository $repository)
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

        $course_all = $this->repository->findByFieldLike('course_name', $request->session()->get('search'), 4);

        if ($request->ajax()) {
            return view('admin/course.ajax', compact('course_all'));
        } else {
            return view('admin/course.index', compact('course_all'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department_all = $this->repository->allDepartment();

        return view('admin/course.create', compact('department_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCourse $request)
    {
        $data = $request->all();
        $department_data = $this->repository->findOrFailDepartment($request['department_id']);
        $course_data = $this->repository->courseCreate($data);
        $department_data->courses()->save($course_data);

        Session::flash('ketqua', 'Tạo lớp thành công' . ' ' . $request['course_name']);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_show = $this->repository->findOrFailCourse($id);
        // 
        $count = $course_show->students()->where('course_id', $id)->count();
        $students = $course_show->students()->where('course_id', $id)->get();       

        return view('admin/course.show', compact('course_show', 'students', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course_edit = $this->repository->findOrFailCourse($id);

        return view('admin/course.edit', compact('course_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCourse $request, $id)
    {
        $course_data = $this->repository->findOrFailCourse($id);

        $data = $request->all();
        $course_data->update($data);

        Session::flash('ketqua', 'Cập nhật thành công thông tin lớp!');

        return redirect()->route('course.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->findOrFailCourse($id);

        $data->delete();
        $data->students()->delete();

        Session::flash('ketqua', 'Đã xóa Lớp' . ' ' . $data->course_name);
        
        return redirect()->route('course.index');
    }
}
