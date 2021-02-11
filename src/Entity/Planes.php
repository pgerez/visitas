<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planes
 *
 * @ORM\Table(name="planes", indexes={@ORM\Index(name="FK_planes_1", columns={"entidadId"})})
 * @ORM\Entity
 */
class Planes
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=400, nullable=false)
     */
    private $descripcion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitasMedico", type="integer", nullable=true)
     */
    private $visitasmedico;

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

    public function getVisitasmedico(): ?int
    {
        return $this->visitasmedico;
    }

    public function setVisitasmedico(?int $visitasmedico): self
    {
        $this->visitasmedico = $visitasmedico;

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
