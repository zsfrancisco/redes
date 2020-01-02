<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equipo", mappedBy="marca_equipo")
     */
    private $equipos;

    public function __construct()
    {
        $this->equipos = new ArrayCollection();
    }

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

    /**
     * @return Collection|Equipo[]
     */
    public function getEquipos(): Collection
    {
        return $this->equipos;
    }

    public function addEquipo(Equipo $equipo): self
    {
        if (!$this->equipos->contains($equipo)) {
            $this->equipos[] = $equipo;
            $equipo->setMarcaEquipo($this);
        }

        return $this;
    }

    public function removeEquipo(Equipo $equipo): self
    {
        if ($this->equipos->contains($equipo)) {
            $this->equipos->removeElement($equipo);
            // set the owning side to null (unless already changed)
            if ($equipo->getMarcaEquipo() === $this) {
                $equipo->setMarcaEquipo(null);
            }
        }

        return $this;
    }
}
