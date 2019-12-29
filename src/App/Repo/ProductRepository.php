<?php

namespace App\Repo;

use App\Entities\Product;

/**
 * Class ProductRepository
 * @package App\Repo
 */
class ProductRepository extends Repository
{
    /**
     * Имя сущности
     */
    protected const ENTITY = Product::class;
}