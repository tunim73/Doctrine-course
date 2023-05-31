<?php

use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$idStudent = $argv[1];

/*
Esse getPartial, cria uma referência de um elemento do banco de dados, mas sem ir ao banco de dados,
apnas seguindo o idStudent, isso significa menos um query ao banco, visto que faziamos
select com find
e depois um update / delete
*/
/*$student= $entityManager->getPartialReference(Student::class, $idStudent);*/

$student = $entityManager->find(Student::class, $idStudent);



$entityManager->remove($student);

$entityManager->flush();