<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

use Antonio\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();

/*$commands = [
    "dt" => "vendor/bin/doctrine"
];*/
ConsoleRunner::run(
    new SingleManagerProvider($entityManager),
//    $commands
);