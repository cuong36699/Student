<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Contracts\OppidanRepository;
use Session;

class OppidanController extends Controller
{
    protected $repository;

    public function __construct(OppidanRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:admin');
    }

    public function createid($id)
    {
        $name_student= $this->repository->findOrFailStudent($id);
        $id_sv = $id;
        
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
        $student_data = $this->repository->findOrFailStudent($request['idsv']);
        $data = $request->all();
        $data['student_id'] = $student_data->id;

        $oppidan_data = $this->repository->oppidanCreate($data);
        $student_data->oppidans()->save($oppidan_data);

        $data['oppidan_id'] = $oppidan_data->id;
        $landlord_data = $this->repository->landlordCreate($data);
        $oppidan_data->landlord()->save($landlord_data);

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
        $student_data = $this->repository->findOrFailStudent($id);
        // get .
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
        $oppidan_edit = $this->repository->findOrFailOppidan($id);

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
        $oppidan_data = $this->repository->findOrFailOppidan($id);
        $data_request = $request->all();

        $oppidan_data->update($data_request);
        $oppidan_data->landlord->update($data_request);

        Session::flash('ketqua', 'đã cập nhật');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->repository->findOrFailOppidan($id);
        $data->delete();
        $data->landlord()->delete();

        Session::flash('ketqua', 'Deleted for violation!');

        return redirect()->back();
    }
}
