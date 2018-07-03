<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface DepartmentRepository.
 *
 * @package namespace App\Repositories;
 */
interface DepartmentRepository extends RepositoryInterface
{
    public function findByFieldLike($field, $session, $paginate);
    public function yearCarbon($field);
    public function departmentCreate($request);
    public function findOrFailDepartment($id);
}
