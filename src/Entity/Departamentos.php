<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamentos
 *
 * @ORM\Table(name="departamentos", indexes={@ORM\Index(name="FK_departamentos_1", columns={"provincia_id"})})
 * @ORM\Entity
 */
class Departamentos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @var \Provincias
     *
     * @ORM\ManyToOne(targetEntity="Provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincia_id", referencedColumnName="id")
     * })
     */
    private $provincia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getProvincia(): ?Provincias
    {
        return $this->provincia;
    }

    public function setProvincia(?Provincias $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }


}
