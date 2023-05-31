<?php

use Antonio\Doctrine\Entity\Course;
use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();


$entityManager->persist(new Course('Quadrinhos'));
$entityManager->persist(new Course('Desenhos'));
$entityManager->persist(new Course('Churrasco'));

$entityManager->flush();
