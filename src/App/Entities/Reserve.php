<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="Reserve")
 * @package App\Entities
 */
class Reserve
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
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
    private $orderId;

    /**
     * @ORM\Column(type="integer")
     */
    private $productId;


}