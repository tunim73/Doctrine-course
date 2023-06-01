<?php

namespace Antonio\Doctrine\Repository;

use Antonio\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;


class StudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses(): array {

        $EntityStudent = Student::class;
        $dql = "SELECT student, phone, course
        FROM $EntityStudent student 
        LEFT JOIN student.phones phone 
        LEFT JOIN student.courses course";

        return $this
            ->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }


}