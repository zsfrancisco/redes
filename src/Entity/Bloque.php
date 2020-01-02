<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BloqueRepository")
 */
class Bloque
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_bloque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion_bloque;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroBloque(): ?int
    {
        return $this->numero_bloque;
    }

    public function setNumeroBloque(int $numero_bloque): self
    {
        $this->numero_bloque = $numero_bloque;

        return $this;
    }

    public function getDescripcionBloque(): ?string
    {
        return $this->descripcion_bloque;
    }

    public function setDescripcionBloque(string $descripcion_bloque): self
    {
        $this->descripcion_bloque = $descripcion_bloque;

        return $this;
    }
}
