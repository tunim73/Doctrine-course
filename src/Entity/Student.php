<?php

namespace Antonio\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
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

    #[OneToMany(mappedBy: "student",targetEntity: Phone::class )]
    public iterable $phones;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->phones = new ArrayCollection();
    }


    public function addPhone(Phone $phone)
    {
        $this->phones[] = $phone;
        $phone->setStudent($this);
    }





    /**
     * @return iterable<Phone>
     */
    public function getPhones(): iterable
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



}