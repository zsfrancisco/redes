<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampoRepository")
 */
class Campo
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
    private $nombre_campo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bloque", mappedBy="campo_bloque")
     */
    private $bloques;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registro", mappedBy="sede")
     */
    private $registros;

    public function __construct()
    {
        $this->bloques = new ArrayCollection();
        $this->registros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCampo(): ?string
    {
        return $this->nombre_campo;
    }

    public function setNombreCampo(string $nombre_campo): self
    {
        $this->nombre_campo = $nombre_campo;

        return $this;
    }

    /**
     * @return Collection|Bloque[]
     */
    public function getBloques(): Collection
    {
        return $this->bloques;
    }

    public function addBloque(Bloque $bloque): self
    {
        if (!$this->bloques->contains($bloque)) {
            $this->bloques[] = $bloque;
            $bloque->setCampoBloque($this);
        }

        return $this;
    }

    public function removeBloque(Bloque $bloque): self
    {
        if ($this->bloques->contains($bloque)) {
            $this->bloques->removeElement($bloque);
            // set the owning side to null (unless already changed)
            if ($bloque->getCampoBloque() === $this) {
                $bloque->setCampoBloque(null);
            }
        }

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
            $registro->setSede($this);
        }

        return $this;
    }

    public function removeRegistro(Registro $registro): self
    {
        if ($this->registros->contains($registro)) {
            $this->registros->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getSede() === $this) {
                $registro->setSede(null);
            }
        }

        return $this;
    }
}
