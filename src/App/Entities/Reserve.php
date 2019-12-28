<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Reserve
 * @package App\Entities
 */
class Reserve
{
    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="reserve")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
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