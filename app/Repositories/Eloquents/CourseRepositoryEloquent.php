<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\CourseRepository;
use App\Models\Course;
use App\Models\Department;

class CourseRepositoryEloquent extends BaseRepository implements CourseRepository
{
    protected $course;
    protected $department;
    
    public function __construct(Course $course, Department $department){
        $this->course = $course;
        $this->department = $department;
    }

    public function model()
    {
        return Course::class;
    }

    public function findByFieldLike($field, $session, $paginate)
    {
        $model = $this->course->where($field, 'like', '%' .$session. '%')->paginate($paginate);

        return $this->parserResult($model);
    }

    public function findOrFailDepartment($id){
        return $this->department->findOrFail($id);
    }

    public function allDepartment($columns = ['*']){
        return $this->department->all();
    }

    public function findOrFailCourse($id){
        return $this->course->findOrFail($id);
    }

    public function courseCreate($request){
        return $this->course->create($request);
    }

    
}
