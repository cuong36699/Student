<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface CourseRepository.
 *
 * @package namespace App\Repositories;
 */
interface CourseRepository extends RepositoryInterface
{
    public function findByFieldLike($field, $session, $paginate);
    public function findOrFailDepartment($id);
    public function allDepartment($columns = ['*']);
    public function findOrFailCourse($id);
    public function courseCreate($request);

}
