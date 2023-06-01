<?php

namespace Antonio\Doctrine\Repository;

use Antonio\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;


class StudentRepository extends EntityRepository
{
    /**
     * @return Student[]
     */
    public function studentsAndCourses(): array
    {
        /*
        Tanto faz usar as queryBuilders ou dql
        */


        //usando queryBuilder
        $query = $this->createQueryBuilder('student')
            ->addSelect('phone')
            ->addSelect('course')
            ->leftJoin('student.phones','phone')
            ->leftJoin('student.courses','course')
            ->getQuery()
            ->getResult();

        return $query;

        /*
        //usando dql
        $EntityStudent = Student::class;
        $dql = "SELECT student, phone, course
        FROM $EntityStudent student 
        LEFT JOIN student.phones phone 
        LEFT JOIN student.courses course";

        return $this
            ->getEntityManager()
            ->createQuery($dql)
            ->getResult();
        */
    }

}