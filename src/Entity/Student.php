<?php

namespace Antonio\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Student
{

    /* Aqui não precisa colocar o type, visto que o $id tem tipagem, mas deixei
    porque da pra ver as possibilidades de configurações */

    #[Id]
    #[GeneratedValue]
    #[Column]
    private readonly int $id;
    #[Column(type: 'string')]
    private readonly string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
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


}