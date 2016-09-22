<?php

namespace ReddogsTest\Doctrine\ORM;

use Reddogs\Doctrine\ORM\EntityManagerAwareTrait;
use Doctrine\ORM\EntityManager;

class EntityManagerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    private $trait;

    protected function setUp()
    {
        $this->trait = $this->getMockForTrait(EntityManagerAwareTrait::class);
    }

    public function testSetEntityManager()
    {
        $entityManager = $this->createMock(EntityManager::class);
        $this->trait->setEntityManager($entityManager);
        $this->assertSame($entityManager, $this->trait->getEntityManager());
    }
}