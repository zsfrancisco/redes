<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RegistroRepository")
 */
class Registro
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
    private $ip_equipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identificacion_registro;

    /**
     * @ORM\Column(type="integer")
     */
    private $piso;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estado", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estado_equipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipo", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campo", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sede;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bloque", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bloque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ubicacion", inversedBy="registros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ubicacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpEquipo(): ?string
    {
        return $this->ip_equipo;
    }

    public function setIpEquipo(string $ip_equipo): self
    {
        $this->ip_equipo = $ip_equipo;

        return $this;
    }

    public function getIdentificacionRegistro(): ?string
    {
        return $this->identificacion_registro;
    }

    public function setIdentificacionRegistro(string $identificacion_registro): self
    {
        $this->identificacion_registro = $identificacion_registro;

        return $this;
    }

    public function getPiso(): ?int
    {
        return $this->piso;
    }

    public function setPiso(int $piso): self
    {
        $this->piso = $piso;

        return $this;
    }

    public function getEstadoEquipo(): ?Estado
    {
        return $this->estado_equipo;
    }

    public function setEstadoEquipo(?Estado $estado_equipo): self
    {
        $this->estado_equipo = $estado_equipo;

        return $this;
    }

    public function getEquipo(): ?Equipo
    {
        return $this->equipo;
    }

    public function setEquipo(?Equipo $equipo): self
    {
        $this->equipo = $equipo;

        return $this;
    }

    public function getSede(): ?Campo
    {
        return $this->sede;
    }

    public function setSede(?Campo $sede): self
    {
        $this->sede = $sede;

        return $this;
    }

    public function getBloque(): ?Bloque
    {
        return $this->bloque;
    }

    public function setBloque(?Bloque $bloque): self
    {
        $this->bloque = $bloque;

        return $this;
    }

    public function getUbicacion(): ?Ubicacion
    {
        return $this->ubicacion;
    }

    public function setUbicacion(?Ubicacion $ubicacion): self
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }
}
