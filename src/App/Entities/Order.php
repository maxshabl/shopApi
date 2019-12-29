<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="OrderRepository")
 * @ORM\Table(name="Order")
 * @package App\Entities
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable", name="create_date")
     */
    private $createDate;

    /**
     * @ORM\Column(type="datetime_immutable", name="update_date", nullable=true)
     */
    private $updateDate;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @var ArrayCollection|Reserve[]
     * @ORM\OneToMany(targetEntity="Reserve", mappedBy="Order", orphanRemoval=true, cascade={"persist"})
     * @ORM\OrderBy({"date" = "ASC"})
     */
    private $reserve;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;
}