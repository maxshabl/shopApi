<?php

namespace App\Repo;

use App\Entities\Reserve;

/**
 * Class ReserveRepository
 * @package App\Repo
 */
class ReserveRepository extends Repository
{
    /**
     * Имя сущности
     */
    protected const ENTITY = Reserve::class;
}