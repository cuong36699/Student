<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\ViolationRepository;
use App\Models\Student;
use App\Models\Violation;

class ViolationRepositoryEloquent extends BaseRepository implements ViolationRepository
{
    protected $violation;
    protected $student;

    public function __construct(Violation $violation, Student $student){
        $this->violation = $violation;
        $this->student = $student;
    }

    public function model()
    {
        return Violation::class;
    }

    public function findOrFailStudent($id){
        return $this->student->findOrFail($id);
    }
    
    public function findOrFailViolation($id){
        return $this->violation->findOrFail($id);
    }

    public function violationCreate($request){
        return $this->violation->create($request);
    }
}
