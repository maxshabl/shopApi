<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\Table(name="User")
 **/
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = 1;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $password = 'admin';

    /**
     * @param string $token
     * @return bool
     */
    public function checkToken(string $token): bool
    {
        return md5($this->password) === $token;
    }
}