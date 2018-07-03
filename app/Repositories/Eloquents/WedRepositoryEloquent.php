<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\WedRepository;
use App\Models\Student;
use App\Models\Oppidan;
use App\Models\Landlord;
use App\Models\Course;

class WedRepositoryEloquent extends BaseRepository implements WedRepository
{
    protected $student;
    protected $oppidan;
    protected $landlord;
    protected $course;

    public function __construct(Student $student,
        Oppidan $oppidan,
        Landlord $landlord,
        Course $course
    )
    {
        $this->student = $student;
        $this->oppidan = $oppidan;
        $this->landlord = $landlord;
        $this->course = $course;
    }

    public function model()
    {
        return Student::class;
    }

    public function findOrFailStudent($id){
        return $this->student->findOrFail($id);
    }
    
    public function findOrFailCourse($id){
        return $this->course->findOrFail($id);
    }

    public function findWithStudent($field, $id){ 
        return $this->student->with($field)->findOrFail($id);
    }

    public function oppidanCreate($input)
    {
        $oppidan_data = $this->oppidan::create([
            'address' => $input['addressopi'],
            'street' => $input['streetopi'],
            'city' => $input['cityopi'],
            'ward' => $input['wardopi'],
            'status' => 0,
            'student_id' => $input['student_id'],
        ]);
        return $oppidan_data;
    }

    public function landlordCreate($input)
    {
        $this->landlord::create([
            'full_name' => $input['full_nameland'],
            'gender' => $input['genderland'],
            'phone' => $input['phoneland'],
            'identity' => $input['identityland'],
            'birthday' => $input['birthdayland'],
            'oppidan_id' => $input['oppidan_id'],
        ]);
        return true;
    }
}
