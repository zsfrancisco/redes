<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipoRepository")
 */
class Equipo
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
    private $nombre_equipo;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_puertos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $serial_equipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion_equipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marca", inversedBy="equipos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marca_equipo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registro", mappedBy="equipo")
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

    public function getNombreEquipo(): ?string
    {
        return $this->nombre_equipo;
    }

    public function setNombreEquipo(string $nombre_equipo): self
    {
        $this->nombre_equipo = $nombre_equipo;

        return $this;
    }

    public function getNumeroPuertos(): ?int
    {
        return $this->numero_puertos;
    }

    public function setNumeroPuertos(int $numero_puertos): self
    {
        $this->numero_puertos = $numero_puertos;

        return $this;
    }

    public function getSerialEquipo(): ?string
    {
        return $this->serial_equipo;
    }

    public function setSerialEquipo(string $serial_equipo): self
    {
        $this->serial_equipo = $serial_equipo;

        return $this;
    }

    public function getDescripcionEquipo(): ?string
    {
        return $this->descripcion_equipo;
    }

    public function setDescripcionEquipo(string $descripcion_equipo): self
    {
        $this->descripcion_equipo = $descripcion_equipo;

        return $this;
    }

    public function getMarcaEquipo(): ?Marca
    {
        return $this->marca_equipo;
    }

    public function setMarcaEquipo(?Marca $marca_equipo): self
    {
        $this->marca_equipo = $marca_equipo;

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
            $registro->setEquipo($this);
        }

        return $this;
    }

    public function removeRegistro(Registro $registro): self
    {
        if ($this->registros->contains($registro)) {
            $this->registros->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getEquipo() === $this) {
                $registro->setEquipo(null);
            }
        }

        return $this;
    }
}
