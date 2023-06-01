<?php

use Antonio\Doctrine\Entity\Phone;
use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$nameStudent = "Zoro";
$student = new Student($nameStudent);
$entityManager->persist($student);


$student->addPhone(new Phone('(21) 111 111 333'));
$student->addPhone(new Phone('(11) 707 777 771'));


/* Forma antiga, quando não tinha o 'persist' configurado no cascade de student

$phone1 = new Phone('(21) 900 000 000');
$phone2 = new Phone('(11) 911 111 111');

$entityManager->persist($phone1);
$entityManager->persist($phone2);

$student->addPhone($phone1);
$student->addPhone($phone2);*/




$entityManager->flush();
