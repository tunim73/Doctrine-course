<?php

use Antonio\Doctrine\Entity\Phone;
use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$nameStudent = "Zoro";
$student = new Student($nameStudent);
$entityManager->persist($student);

$phone1 = new Phone('(21) 900 000 000');
$phone2 = new Phone('(11) 911 111 111');

$entityManager->persist($phone1);
$entityManager->persist($phone2);

$student->addPhone($phone1);
$student->addPhone($phone2);

$entityManager->flush();
