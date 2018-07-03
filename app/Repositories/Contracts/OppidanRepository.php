<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

/**
 * Interface OppidanRepository.
 *
 * @package namespace App\Repositories;
 */
interface OppidanRepository extends RepositoryInterface
{
    public function findOrFailStudent($id);
    public function findOrFailOppidan($id);
    public function oppidanCreate($request);
    public function landlordCreate($request);
}
