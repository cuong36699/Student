<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\StudentRepository;
use App\Models\Student;
use App\Models\Course;
use App\Models\Department;
use App\Models\Member;
use App\Models\Risident;
use App\Models\User;
use Mail;

/**
 * Class StudentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class StudentRepositoryEloquent extends BaseRepository implements StudentRepository
{
    protected $course;
    protected $student;
    protected $department;
    protected $member;
    protected $risident;

    public function __construct(Student $student,
        Course $course,
        Department $department,
        Member $member,
        Risident $risident,
        User $user
    )
    {
        $this->course = $course;
        $this->student = $student;
        $this->department = $department;
        $this->member = $member;
        $this->risident = $risident;
        $this->user = $user;
    }
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Student::class;
    }

    public function findByFieldLike($field, $session, $paginate)
    {
        $model = $this->student->where($field, 'like', '%' .$session. '%')->paginate($paginate);

        return $this->parserResult($model);
    }

    public function findOrFailStudent($id)
    {
        $model = $this->student->findOrFail($id);

        return $this->parserResult($model);
    }

    public function sendMail($field, $request){
        Mail::send($field, $request, function($message) use ($request){
            $message->to($request['email']);
            $message->subject('Thông báo từ admin');
        });
    }

    public function pluckCourse($column, $key = null){
        return $this->course::pluck($column, $key);
    }

    public function pluckDepartment($column, $key = null){
        return $this->department->pluck($column, $key)->all();
    }

    public function departmentShowCourse($request, $field){
       return $this->course->whereDepartmentId($request)->select($field)->get();
    }

    public function studentCreate($request){
        return $this->student->create($request);
    }

    public function memberCreate($request){
        return $this->member->create($request);
    }

    public function risidentCreate($request){
        return $this->risident->create($request);
    }

    public function userCreate($request){
        return $this->user->create($request);
    }

    public function findWithStudent($field, $id){ 
        return $this->student->with($field)->findOrFail($id);
    }

    public function findOrFailCourse($id)
    {
        $model = $this->course->findOrFail($id);

        return $this->parserResult($model);
    }
}
