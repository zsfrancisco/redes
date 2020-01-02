<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UbicacionRepository")
 */
class Ubicacion
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
    private $descripcion_ubicacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcionUbicacion(): ?string
    {
        return $this->descripcion_ubicacion;
    }

    public function setDescripcionUbicacion(string $descripcion_ubicacion): self
    {
        $this->descripcion_ubicacion = $descripcion_ubicacion;

        return $this;
    }
}
