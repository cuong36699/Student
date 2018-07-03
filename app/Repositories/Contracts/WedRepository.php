<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface WedRepository extends RepositoryInterface
{
    public function findOrFailStudent($id);
    public function findOrFailCourse($id);
    public function findWithStudent($field, $id);
   	public function oppidanCreate($input);
   	public function landlordCreate($input);
}
