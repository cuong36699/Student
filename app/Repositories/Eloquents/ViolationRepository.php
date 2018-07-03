<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface ViolationRepository.
 *
 * @package namespace App\Repositories;
 */
interface ViolationRepository extends RepositoryInterface
{
    public function findOrFailStudent($id);
    public function findOrFailViolation($id);
    public function violationCreate($request);
}
