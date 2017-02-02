<?php

namespace ReddogsTest\Doctrine\ORM;

use Reddogs\Doctrine\ORM\Entity;

class EntityTest extends \PHPUnit_Framework_TestCase
{
    private $entity;

    protected function setUp()
    {
        $this->entity = $this->getMockBuilder(Entity::class)
            ->getMockForAbstractClass();
    }

    public function testGetId()
    {
        $this->assertSame(-1, $this->entity->getId());
    }

    public function testIsNull()
    {
        $this->assertTrue($this->entity->isNull());
    }

    public function testIsNullEntityHasPositivId()
    {
        $entity = $this->getMockBuilder(Entity::class)
            ->setConstructorArgs([2])
            ->getMockForAbstractClass();
        $this->assertFalse($entity->isNull());
    }
}