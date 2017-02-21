<?php

namespace ReddogsTest\Doctrine\ORM;

use Reddogs\Doctrine\ORM\EntityManagerAwareTrait;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class EntityManagerAwareTraitTest extends TestCase
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