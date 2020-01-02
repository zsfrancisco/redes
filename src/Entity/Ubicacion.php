<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bloque", inversedBy="ubicaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bloque_ubicacion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registro", mappedBy="ubicacion")
     */
    private $registros;

    public function __construct()
    {
        $this->registros = new ArrayCollection();
    }

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

    public function getBloqueUbicacion(): ?Bloque
    {
        return $this->bloque_ubicacion;
    }

    public function setBloqueUbicacion(?Bloque $bloque_ubicacion): self
    {
        $this->bloque_ubicacion = $bloque_ubicacion;

        return $this;
    }

    /**
     * @return Collection|Registro[]
     */
    public function getRegistros(): Collection
    {
        return $this->registros;
    }

    public function addRegistro(Registro $registro): self
    {
        if (!$this->registros->contains($registro)) {
            $this->registros[] = $registro;
            $registro->setUbicacion($this);
        }

        return $this;
    }

    public function removeRegistro(Registro $registro): self
    {
        if ($this->registros->contains($registro)) {
            $this->registros->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getUbicacion() === $this) {
                $registro->setUbicacion(null);
            }
        }

        return $this;
    }
}
