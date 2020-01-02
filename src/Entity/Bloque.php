<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campo", inversedBy="bloques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campo_bloque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ubicacion", mappedBy="bloque_ubicacion")
     */
    private $ubicaciones;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registro", mappedBy="bloque")
     */
    private $registros;

    public function __construct()
    {
        $this->ubicaciones = new ArrayCollection();
        $this->registros = new ArrayCollection();
    }

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

    public function getCampoBloque(): ?Campo
    {
        return $this->campo_bloque;
    }

    public function setCampoBloque(?Campo $campo_bloque): self
    {
        $this->campo_bloque = $campo_bloque;

        return $this;
    }

    /**
     * @return Collection|Ubicacion[]
     */
    public function getUbicaciones(): Collection
    {
        return $this->ubicaciones;
    }

    public function addUbicacione(Ubicacion $ubicacione): self
    {
        if (!$this->ubicaciones->contains($ubicacione)) {
            $this->ubicaciones[] = $ubicacione;
            $ubicacione->setBloqueUbicacion($this);
        }

        return $this;
    }

    public function removeUbicacione(Ubicacion $ubicacione): self
    {
        if ($this->ubicaciones->contains($ubicacione)) {
            $this->ubicaciones->removeElement($ubicacione);
            // set the owning side to null (unless already changed)
            if ($ubicacione->getBloqueUbicacion() === $this) {
                $ubicacione->setBloqueUbicacion(null);
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
            $registro->setBloque($this);
        }

        return $this;
    }

    public function removeRegistro(Registro $registro): self
    {
        if ($this->registros->contains($registro)) {
            $this->registros->removeElement($registro);
            // set the owning side to null (unless already changed)
            if ($registro->getBloque() === $this) {
                $registro->setBloque(null);
            }
        }

        return $this;
    }
}
