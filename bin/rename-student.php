<?php

use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//classe ou objeto de uma tabela
$studentRepository = $entityManager->getRepository(Student::class);

$idStudent = $argv[1];
$student = $studentRepository->find($idStudent);
/* ou
$student = $entityManager->find(Student::class, $idStudent); - como to pegando apenas
um elemento, posso usar o entityManager para isso. Mas caso seja consultas outros tipos de consulta, então
precisarei usar o repository
*/

$newName = $argv[2];
$student->setNome($newName);

/*
$entityManager->persist($student);
Esse persist aqui é desnecessário, pois como esta entidade já vem do banco de dados,
ela já tem o persist por padrão
*/

$entityManager->flush();


