<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarcaRepository")
 */
class Marca
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_marca;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreMarca(): ?string
    {
        return $this->nombre_marca;
    }

    public function setNombreMarca(string $nombre_marca): self
    {
        $this->nombre_marca = $nombre_marca;

        return $this;
    }
}
