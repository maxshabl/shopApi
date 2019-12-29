<?php

namespace App\Repo;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class Repository
 * @package App\Repo
 */
class Repository
{
    /**
     * Имя сущности
     */
    protected const ENTITY = '';

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var EntityRepository
     */
    protected $repo;

    /**
     * OrderRepository constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->repo = $em->getRepository(static::ENTITY);
    }
}