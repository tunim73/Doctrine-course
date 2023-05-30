<?php

use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$nameStudent = $argv[1];
$student = new Student($nameStudent);

$entityManager->persist($student);

$entityManager->flush();
