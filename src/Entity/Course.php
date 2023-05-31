<?php

namespace Antonio\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[Column]
    public string $nome;

    #[ManyToMany(Student::class, inversedBy: "courses")]
    private Collection $students;

    /**
     * @param string $nome
     */
    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->students = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return Collection<Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function addStudentInCourse(Student $student): void
    {
        $contemStudent = $this->students->contains($student);

        if($contemStudent)
            return;

        $this->students->add($student);
        $student->enrollInCourse($this);
    }


}