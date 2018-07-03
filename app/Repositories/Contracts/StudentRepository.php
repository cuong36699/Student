<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface StudentRepository.
 *
 * @package namespace App\Repositories\Contracts;
 */
interface StudentRepository extends RepositoryInterface
{
   public function findByFieldLike($field, $session, $paginate);
   public function findOrFailStudent($id);
   public function findOrFailCourse($id);
   public function sendMail($field, $request);
   public function pluckCourse($column, $key = null);
   public function pluckDepartment($column, $key = null);
   public function departmentShowCourse($request, $field);
   public function studentCreate($request);
   public function memberCreate($request);
   public function risidentCreate($request);
   public function userCreate($request);
   public function findWithStudent($field, $id);
}
