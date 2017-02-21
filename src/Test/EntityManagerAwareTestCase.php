<?php
namespace Reddogs\Doctrine\Test;

use Doctrine\ORM\EntityManager;
use Reddogs\Test\ServiceManagerAwareTestCase;

class EntityManagerAwareTestCase extends ServiceManagerAwareTestCase
{

    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->getContainer()->get(EntityManager::class);
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

        $sql = '';
        foreach ($entityClassnames as $entityClassname) {
            $metadata = $em->getClassMetadata($entityClassname);
            $tablename = $metadata->getTableName();
            $sql .= $platform->getTruncateTableSQL($tablename) . ';';
        }
        $connection->executeQuery($sql);
    }
}