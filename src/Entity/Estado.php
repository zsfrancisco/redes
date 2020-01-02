<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
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
    private $nombre_estado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreEstado(): ?string
    {
        return $this->nombre_estado;
    }

    public function setNombreEstado(string $nombre_estado): self
    {
        $this->nombre_estado = $nombre_estado;

        return $this;
    }
}
