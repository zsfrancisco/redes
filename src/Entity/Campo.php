<?php

namespace App\Entity;

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
}
