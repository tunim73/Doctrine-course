<?php

require_once 'vendor/autoload.php';

require 'vendor/autoload.php';

use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\DependencyFactory;
use Antonio\Doctrine\Helper\EntityManagerCreator;


$config = new PhpFile(__DIR__ . '/migrations.php');

$paths = [__DIR__ . '/lib/MyProject/Entities'];
$isDevMode = true;

$entityManager = EntityManagerCreator::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));


/*
$commands = [
    "dt" => "vendor/bin/doctrine"
];
ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
//    $commands
);


*/



