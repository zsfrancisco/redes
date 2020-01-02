<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registro", mappedBy="estado_equipo")
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

    public function getNombreEstado(): ?string
    {
        return $this->nombre_estado;
    }

    public function setNombreEstado(string $nombre_estado): self
    {
        $this->nombre_estado = $nombre_estado;

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
            $registro->setEstadoEquipo($this);
        }

        return $this;
    }

    public function removeRegistro(Registro $registro): self
    {
        if ($this->registros->contains($registro)) {
            $this->registros->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getEstadoEquipo() === $this) {
                $registro->setEstadoEquipo(null);
            }
        }

        return $this;
    }
}
