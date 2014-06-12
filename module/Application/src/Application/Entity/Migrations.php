<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migrations
{
    /**
     *
     * @ORM\Column(type="string", length=255)
     * @ORM\Id
     * @var string
     */
    protected $version;

    /**
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
