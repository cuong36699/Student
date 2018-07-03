<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\WedRepository;
use Session;

class WedController extends Controller
{
    protected $repository;

    public function __construct(WedRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth');
    }

    public function changeLanguage($language)
    {   
        Session::put('website_language', $language);
        Session::flash('ketqua', trans('layout/wed.st_flash'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = $this->repository->findOrFailStudent(Auth::id());

        return view('wed.index',compact('student'));
    }

    public function course($id)
    {
        $student_id = $this->repository->findOrFailStudent(Auth::id());
        $course_id = $student_id->courses->last()->id;
        $course_show = $this->repository->findOrFailCourse($course_id);

        $count = $course_show->students()->where('course_id', $course_id)->count();
        $students = $course_show->students()->where('course_id', $course_id)->get();       

        return view('wed.course', compact('student_id','course_show', 'students', 'count'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_data = $this->repository->findOrFailStudent(Auth::id());
        $student = $this->repository->findWithStudent(['member', 'risident'], Auth::id());
        $course = $student->courses->last();
        $oppidan = $student_data->oppidans->last();
        
        return view('wed.show',compact('student', 'course', 'oppidan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_data = $this->repository->findOrFailStudent(Auth::id());
        $student = $this->repository->findWithStudent(['member', 'risident'], Auth::id());
        $course = $student->courses->last();
        $oppidan = $student_data->oppidans->last();

        return view('wed.edit',compact('student', 'course', 'oppidan'));
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
        $data_student = $this->repository->findOrFailStudent(Auth::id());
        $data_rq = $request->all();
        $data_student->update($data_rq);
        $data_rq['student_id'] = $data_student->id;
        // update member
        $data_student->member->update($data_rq);
         // update risident
        $data_student->risident->update($data_rq);
        $oppidan_data = $this->repository->oppidanCreate($data_rq);
        $data_rq['oppidan_id'] = $oppidan_data->id;
        $landlord_data = $this->repository->landlordCreate($data_rq);

        Session::flash('ketqua', 'Đã sửa thành công' . ' ' . $request['full_name']);

        return redirect()->route('wed.show', Auth::id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
