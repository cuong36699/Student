<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\DepartmentRepository;
use App\Models\Department;
use App\Models\Course;
use Carbon;

class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    protected $course;
    protected $department;
    
    public function __construct(Course $course, Department $department){
        $this->course = $course;
        $this->department = $department;
    }

    public function model()
    {
        return Department::class;
    }

    public function findByFieldLike($field, $session, $paginate)
    {
        $model = $this->department->where($field, 'like', '%' .$session. '%')->paginate($paginate);

        return $this->parserResult($model);
    }

    public function yearCarbon($field){
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $field)->year;
    }

    public function departmentCreate($request){
        return $this->department->create($request);
    }
    
    public function findOrFailDepartment($id){
        return $this->department->findOrFail($id);
    }
}
