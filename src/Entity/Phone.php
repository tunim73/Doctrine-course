<?php

namespace Antonio\Doctrine\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{


    #[Id, GeneratedValue, Column]
    private int $id;

    #[Column]
    public string $number;

    /*
    inversedBy é opcional aqui , mas ela serve para falar que do outro lado tem uma referência também,
    pelo que entendi. Traz benefícios de desempenho e medidade de erros
    */
    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones" )]
    public Student $student;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }



}