<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    protected $email;

    /**
     * get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

   /**
    * get email
    *
    * @return string
    */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * set email
     *
     * @param string $email
     * @return \Application\Entity\User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}
