<?php

use Antonio\Doctrine\Entity\Course;
use Antonio\Doctrine\Entity\Phone;
use Antonio\Doctrine\Entity\Student;
use Antonio\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$studentList = $studentRepository->studentsAndCourses();


///** @var Student[] $studentList */
//$studentList = $entityManager->getRepository(Student::class)->findAll();


/*$dql = 'SELECT alguma_coisa FROM Antonio\\Doctrine\\Entity\\Student alguma_coisa';*/
///** @var Student[] $studentList */
/*$studentList = $entityManager->createQuery($dql)->getResult();*/


/*//classe ou objeto de uma tabela
$studentRepository = $entityManager->getRepository(Student::class);*/
///** @var Student[] $studentList */
/*$studentList = $studentRepository->findAll(); // nem precisei forçar o relacionamento aqui, foi automático*/


foreach ($studentList as $student ){
    $id = $student->getId();
    $nome = $student->getNome();

    echo "id: $id Nome: {$student->getNome()}" . PHP_EOL;

    echo implode(', ',$student->getPhones()
        ->map(fn(Phone $phone) => $phone->number)
        ->toArray());
    echo PHP_EOL;
    echo implode(', ', $student->getCourses()
    ->map(fn(Course $course) => $course->nome)
    ->toArray());

    echo PHP_EOL;

    echo '-----------------------------------'. PHP_EOL;
    /*
    To pegando uma colection, faço um map dela, aparentemente só dar fazer map de collections.
    e com ->to array(); transformo a coleção para um array normal.

    Por mais que só de para fazer map de collections, a função array_map tem o mesmo efeito em arrays.
    */


    echo PHP_EOL;
}
$EntityStudent = Student::class;
$dql = "SELECT COUNT(students) AS NUMERO FROM $EntityStudent students";
$result =  $entityManager->createQuery($dql)->enableResultCache(84600)->getSingleScalarResult();
var_dump($result);
//var_dump($entityManager->createQuery($dql)->getSingleResult();
//var_dump($entityManager->createQuery($dql)->getResult());
//echo 'Quantidade de alunos: ' . count($studentList);


/*
$student = $studentRepository->find(2);
echo $student->getNome() . PHP_EOL;
*/
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
/*

$student = $studentRepository->findBy([
   "nome" => "Sakura"
]);

echo $student[0]->getNome() . PHP_EOL;

$student = $studentRepository->findOneBy([
    "nome" => "Naruto usumaki"
]);

echo $student->getNome() . PHP_EOL;
*/