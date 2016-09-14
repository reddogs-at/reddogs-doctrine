<?php

namespace Reddogs\Doctrine\Test;

use Reddogs\Test\ContainerAwareTestCase;
use Doctrine\ORM\EntityManager;

class EntityManagerAwareTestCase extends ContainerAwareTestCase
{
    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->getContainer()->get('doctrine.entitymanager.orm_default');
    }

    /**
     * Truncate entities
     *
     * @param array $entityClassnames
     */
    protected function truncateEntities(array $entityClassnames)
    {
        $em = $this->getEntityManager();
        $connection = $em->getConnection();
        $platform = $connection->getDatabasePlatform();

        foreach ($entityClassnames as $entityClassname) {
            $metadata = $em->getClassMetadata($entityClassname);
            $tablename = $metadata->getTableName();
            $sql = $platform->getTruncateTableSQL($tablename);
        }
    }
}