<?php

use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//classe ou objeto de uma tabela
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student ){
    $id = $student->getId();
    $nome = $student->getNome();

    echo "id: $id Nome: {$student->getNome()}" . PHP_EOL;
}

$student = $studentRepository->find(2);
echo $student->getNome() . PHP_EOL;

/*
public function findBy(
    array $criteria,
    ?array $orderBy = null,
    ?int $limit = null,
    ?int $offset = null
)
exemplo:
$alunoRepository->findBy([], ['nome' => 'ASC'], 2, 3);
*/


$student = $studentRepository->findBy([
   "nome" => "Sakura"
]);

echo $student[0]->getNome() . PHP_EOL;

$student = $studentRepository->findOneBy([
    "nome" => "Naruto usumaki"
]);

echo $student->getNome() . PHP_EOL;