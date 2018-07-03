<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogViolation;
use App\Http\Requests\UpdateBlogViolation;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Contracts\ViolationRepository;
use App\Models\Student;
use App\Models\Violation;
use Session;

class ViolationController extends Controller
{
    protected $repository;

    public function __construct(ViolationRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }
    
    public function createid($id)
    {
        $name_student = $this->repository->findOrFailStudent($id);
        $id_sv = $id;

        return view('admin/violation.create', compact('id_sv', 'name_student'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogViolation $request)
    {
        $student_data = $this->repository->findOrFailStudent($request['idsv']);
        
        $data = $request->all();
        $data['student_id'] = $student_data->id;
        $violation_data = $this->repository->violationCreate($data);
        $student_data->violations()->save($violation_data);

        Session::flash('ketqua', 'Đã tạo vi phạm cho sinh viên' . $student_data->full_name);

        return redirect()->route('student.show', $request['idsv']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_data = $this->repository->findOrFailStudent($id);
        $violation = $student_data->violations()->where('student_id', $id)->get();

        return view('admin/violation.show', compact('violation', 'student_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violation_edit = $this->repository->findOrFailViolation($id);

        return view('admin/violation.edit', compact('violation_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogViolation $request, $id)
    {
        $violation_data = $this->repository->findOrFailViolation($id);
        $data = $request->all();
        $violation_data->update($data);

        Session::flash('ketqua', 'Cập nhật thành công thông tin vi phạm!');

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->findOrFailViolation($id);
        $data->delete();

        Session::flash('ketqua', 'Đã xóa thành công vi phạm');

        return redirect()->back();
    }
}
