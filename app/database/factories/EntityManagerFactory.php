<?php

namespace App\database\factories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerFactory
{
    public static function createEntityManager(string $entityPath): EntityManager
    {
        $isDevMode = true;
        $config = ORMSetup::createAnnotationMetadataConfiguration([$entityPath], $isDevMode);

        $dbParams = array(
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'root',
            'password' => '',
            'dbname' => 'test',
        );

        return EntityManager::create($dbParams, $config);
    }
}
