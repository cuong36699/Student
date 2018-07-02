<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Oppidan;
use App\Models\Landlord;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Session;

class WedController extends Controller
{
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
        $ids = Auth::id();
        
        $student = Student::findOrFail($ids);
        return view('wed.index',compact('student'));
    }

    public function course($id)
    {
        $ids = Auth::id();
        $student_id = Student::findOrFail($ids);
        $course_show = Course::findOrFail($student_id->courses->last()->id);

        $count = $course_show->students()->where('course_id', $student_id->courses->last()->id)->count();
        $students = $course_show->students()->where('course_id', $student_id->courses->last()->id)->get();       


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
        $ids = Auth::id();
        $student_data = Student::findOrFail($ids);
        $student = Student::with('member', 'risident')->findOrFail($ids);
        // lay lop cuoi
        $course = $student->courses->last();
        $oppidan = $student_data->oppidans->last();
        // dd($oppidan);
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
        $ids = Auth::id();
        $student_data = Student::findOrFail($ids);
        $student = Student::with('member', 'risident')->findOrFail($ids);
        // lay lop cuoi
        $course = $student->courses->last();
        $oppidan = $student_data->oppidans->last();
        // dd($oppidan);
        // dd($oppidan);
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
        $ids = Auth::id();
        $data_student = Student::findOrFail($ids);
        $data_rq = $request->all();
        $data_student->update($data_rq);
        // update member
        $data_student->member->update($data_rq);
         // update risident
        $data_student->risident->update($data_rq);
        // 
         $oppidan_data = new Oppidan;
            $oppidan_data->address = $request['addressopi'];
            $oppidan_data->street = $request['streetopi'];
            $oppidan_data->city = $request['cityopi'];
            $oppidan_data->ward = $request['wardopi'];
            $oppidan_data->status = 0;
            $oppidan_data->student_id = $data_student;
            $data_student->oppidans()->save($oppidan_data);
            // 
            $landlord_data = new Landlord;
            $landlord_data->full_name = $request['full_nameland'];
            $landlord_data->gender = $request['genderland'];
            $landlord_data->phone = $request['phoneland'];
            $landlord_data->identity = $request['identityland'];
            $landlord_data->birthday = $request['birthdayland'];
            $oppidan_data->landlord()->save($landlord_data);
        // $oppidan = Oppidan::create($data_rq);
        // $landlord = Landlord::create($data_rq);
        return redirect()->route('wed.show',$ids);
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
