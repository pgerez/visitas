<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sucursales
 *
 * @ORM\Table(name="sucursales", indexes={@ORM\Index(name="FK_sucursales_1", columns={"entidadId"})})
 * @ORM\Entity
 */
class Sucursales
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Entidades
     *
     * @ORM\ManyToOne(targetEntity="Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidadId", referencedColumnName="id")
     * })
     */
    private $entidadid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEntidadid(): ?Entidades
    {
        return $this->entidadid;
    }

    public function setEntidadid(?Entidades $entidadid): self
    {
        $this->entidadid = $entidadid;

        return $this;
    }


}
