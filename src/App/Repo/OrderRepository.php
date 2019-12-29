<?php

namespace App\Repo;

use App\Entities\Order;

/**
 * Class OrderRepository
 * @package App\Repo
 */
class OrderRepository extends Repository
{
    /**
     * Имя сущности
     */
    protected const ENTITY = Order::class;
}