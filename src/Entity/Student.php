<?php

namespace Antonio\Doctrine\Entity;

use Antonio\Doctrine\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity(repositoryClass: StudentRepository::class)]
class Student
{

    /* Aqui não precisa colocar o type, visto que o $id tem tipagem, mas deixei
    porque da pra ver as possibilidades de configurações */

    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;
    #[Column(type: 'string')]
    private string $nome;

    #[OneToMany(
        mappedBy: "student",
        targetEntity: Phone::class,
        cascade: ['persist', 'remove'],
        fetch: 'EAGER' )] /* com fetch == eager, toda vez que for feito uma consulta querendo student,
        vai pegar os telefones junto */
    public iterable $phones;

    #[ManyToMany(Course::class, mappedBy: 'students')]
    private Collection $courses;

    /**
     * @return Collection<Student>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }


    public function addPhone(Phone $phone)
    {
        $this->phones[] = $phone;
        $phone->setStudent($this);
    }

    /**
     * @return Collection<Phone>
     */
    public function getPhones(): Collection
    {
        return $this->phones;
    }



    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function enrollInCourse(Course $course): void {
        $contemCurso = $this->courses->contains($course);

        if($contemCurso)
            return;

        $this->courses->add($course);
        $course->addStudentInCourse($this);

    }


}