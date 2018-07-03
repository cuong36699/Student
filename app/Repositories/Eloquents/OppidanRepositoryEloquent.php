<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\BaseRepository;
use App\Repositories\Contracts\OppidanRepository;
use App\Models\Student;
use App\Models\Oppidan;
use App\Models\Landlord;

class OppidanRepositoryEloquent extends BaseRepository implements OppidanRepository
{
    protected $oppidan;
    protected $student;
    protected $landlord;

    public function __construct(Oppidan $oppidan, Student $student, Landlord $landlord){
        $this->oppidan = $oppidan;
        $this->student = $student;
        $this->landlord = $landlord;
    }

    public function model()
    {
        return Oppidan::class;
    }
    
    public function findOrFailStudent($id){
        return $this->student->findOrFail($id);
    }

    public function oppidanCreate($request){
        return $this->oppidan->create($request);
    }

    public function landlordCreate($request){
        return $this->landlord->create($request);
    }

    public function findOrFailOppidan($id){
        return $this->oppidan->findOrFail($id);
    }
}
