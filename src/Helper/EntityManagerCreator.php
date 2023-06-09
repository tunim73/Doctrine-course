<?php

namespace Antonio\Doctrine\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

require_once "vendor/autoload.php";

class EntityManagerCreator
{
    public static function createEntityManager()
    {

        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__."/.."), /* Aqui define os lugares onde se pode ter entidades para serem relacionadas
            com as tabelas do banco de dados */
            isDevMode: true,
        );

        /*$connection = DriverManager::getConnection([
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ], $config);*/

        $config->setMiddlewares([
            new Middleware(
                new ConsoleLogger(
                    new ConsoleOutput(
                        ConsoleOutput::VERBOSITY_DEBUG)))
        ]);

        $cacheDirectory = __DIR__ . '/../../var/cache';

        $config->setMetadataCache(
            new PhpFilesAdapter(
                namespace: 'metadata_cache',
                directory: $cacheDirectory
            )
        );

        $config->setQueryCache(
            new PhpFilesAdapter(
                namespace: 'query_cache',
                directory: $cacheDirectory
            )
        );

        $config->setResultCache(new PhpFilesAdapter(
            namespace: 'result_cache',
            directory: $cacheDirectory
        ));

        $connection = DriverManager::getConnection([
            'dbname' => 'doctrineBasic',
            'user' => 'laranja',
            'password' => 'mynewpassword',
            'host' => 'localhost:3306',
            'driver' => 'pdo_mysql',
        ], $config);

        $entityManager = new EntityManager($connection, $config);
        return $entityManager;
    }
}