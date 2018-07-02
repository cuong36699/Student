<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Oppidan;
use App\Models\Landlord;
use Session;

class OppidanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function createid($id)
    {
        // lay tên sinh viên và id
        $name_student= Student::findOrFail($id);
        $id_sv = $id;
        // dd($id_sv);
        return view('admin/oppidan.create', compact('id_sv', 'name_student'));
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
    public function store(Request $request)
    {
        $student_data = Student::findOrFail($request['idsv']);
        
        if ($student_data) {
            $oppidan_data = new Oppidan;
            $oppidan_data->address = $request['address'];
            $oppidan_data->street = $request['street'];
            $oppidan_data->city = $request['city'];
            $oppidan_data->ward = $request['ward'];
            $oppidan_data->status = $request['status'];
            $oppidan_data->student_id = $student_data;
            $student_data->oppidans()->save($oppidan_data);
            // 
            $landlord_data = new Landlord;
            $landlord_data->full_name = $request['full_name'];
            $landlord_data->gender = $request['gender'];
            $landlord_data->phone = $request['phone'];
            $landlord_data->identity = $request['identity'];
            $landlord_data->birthday = $request['birthday'];
            $oppidan_data->landlord()->save($landlord_data);
        }
            Session::flash('ketqua', 'Đã tạo ngoại trú cho sinh viên' . $student_data->full_name);

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
        $oppidan = $student_data->oppidans()->where('student_id', $id)->get();

        return view('admin/oppidan.show', compact('oppidan', 'student_data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oppidan_edit = Oppidan::findOrFail($id);

        return view('admin/oppidan.edit', compact('oppidan_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $oppidan_data = Oppidan::findOrFail($id);
            $data_request = $request->all();
            $oppidan_data->update($data_request) ;
            $oppidan_data->landlord->update($data_request);

            Session::flash('ketqua', 'đã cập nhật');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Oppidan::findOrFail($id);
        $data->delete();
        $data->landlord()->delete();
        // dd();
            Session::flash('ketqua', 'Deleted for violation!');

        return redirect()->back();
    }
}
