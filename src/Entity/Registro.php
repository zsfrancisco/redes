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
}
