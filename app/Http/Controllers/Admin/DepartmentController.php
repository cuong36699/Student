<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Http\Requests\StoreBlogDepartment;
use App\Http\Requests\UpdateBlogDepartment;
use App\Repositories\Contracts\DepartmentRepository;
use Session;

class DepartmentController extends Controller
{
    protected $repository;

    public function __construct(DepartmentRepository $repository)
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

        $department_all = $this->repository->findByFieldLike('department_name', $request->session()->get('search'), 4);

        if ($request->ajax()) {
            return view('admin/department.ajax', compact('department_all'));
        } else {
            return view('admin/department.index', compact('department_all'));
        }         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timestemp = today();
        $year = $this->repository->yearCarbon($timestemp);

        return view('admin/department.create', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogDepartment $request)
    {
        $data = $request->all();
        $department_data = $this->repository->departmentCreate($data);

        Session::flash('ketqua', 'Tạo mới khoa thành công' . ' ' . $data['department_name']);
    
        return redirect()->route('department.show', $department_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department_show = $this->repository->findOrFailDepartment($id);

        $paging_course = $department_show->courses()->paginate(5);
        
        return view('admin/department.show', compact('department_show', 'paging_course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department_edit = $this->repository->findOrFailDepartment($id);

        $timestemp = today();
        $year = $this->repository->yearCarbon($timestemp);

        return view('admin/department.edit', compact('department_edit','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogDepartment $request, $id)
    {
        $data_department = $this->repository->findOrFailDepartment($id);

        $data_rq = $request->all();
        $data_department->update($data_rq);

        Session::flash('ketqua', 'Cập nhật thành công thông tin khoa'. ' '. $data_rq['department_name']);

        return redirect()->route('department.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->findOrFailDepartment($id);
        $data->delete();
        $data->courses()->delete();

        Session::flash('ketqua', 'Đã xóa Khoa' . ' ' . $data->department_name);
        
        return redirect()->route('department.index');
    }
}
