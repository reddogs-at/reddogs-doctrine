<?php

declare(strict_types=1);

namespace Reddogs\Doctrine\ORM;

abstract class Entity
{
    /**
     * Id
     *
     * @var int
     */
    private $id;

    /**
     * Constructor
     *
     * @param int $id
     */
    public function __construct($id = -1)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Is null
     *
     * @return boolean
     */
    public function isNull() : bool
    {
        return (-1 === $this->getId());
    }
}