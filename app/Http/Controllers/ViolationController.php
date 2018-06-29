<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBlogViolation;
use App\Http\Requests\UpdateBlogViolation;
use App\Models\Student;
use App\Models\Violation;
use Session;

class ViolationController extends Controller
{
    public function createid($id)
    {
        // lay tên sinh viên và id
        $name_student= Student::findOrFail($id);
        $id_sv = $id;
        // dd($id_sv);
        return view('violation.create', compact('id_sv', 'name_student'));
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
        // 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogViolation $request)
    {
        $student_data = Student::findOrFail($request['idsv']);
        
        if ($student_data) {
            $violation_data = new Violation;
            $violation_data->date_violation = $request['date_violation'];
            $violation_data->form_of_violation = $request['form_of_violation'];
            $violation_data->discipline = $request['discipline'];
            $violation_data->student_id = $student_data;
            $student_data->violations()->save($violation_data);
        }
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã tạo vi phạm cho sinh viên' . $student_data->full_name);
        } else {
            Session::flash('ketqua', 'Created violation for' . $student_data->full_name);
        }

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
        $student_data = Student::findOrFail($id);
        // lấy lớp thông qua pivot 
        $violation = $student_data->violations()->where('student_id', $id)->get();

        return view('violation.show', compact('violation', 'student_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $violation_edit = Violation::findOrFail($id);

        return view('violation.edit', compact('violation_edit'));
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
        $data = Violation::findOrFail($id);
        $data->date_violation = $request['date_violation'];
        $data->form_of_violation = $request['form_of_violation'];
        $data->discipline = $request['discipline'];
        $data->save();
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Cập nhật thành công thông tin vi phạm!');
        } else {
            Session::flash('ketqua', 'Updated for violation!');
        }

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
        $data = Violation::findOrFail($id);
        $data->delete();
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã xóa thành công vi phạm');
        } else {
            Session::flash('ketqua', 'Deleted for violation!');
        }

        return redirect()->back();
    }
}
