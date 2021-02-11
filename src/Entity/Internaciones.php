<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Internaciones
 *
 * @ORM\Table(name="internaciones", indexes={@ORM\Index(name="FK_internaciones_1", columns={"afiliadoId"})})
 * @ORM\Entity
 */
class Internaciones
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechaDesde", type="datetime", nullable=false)
     */
    private $fechadesde;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaHasta", type="datetime", nullable=true)
     */
    private $fechahasta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="string", length=2000, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"fixed"=true})
     */
    private $estado;

    /**
     * @var \Afiliados
     *
     * @ORM\ManyToOne(targetEntity="Afiliados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afiliadoId", referencedColumnName="id")
     * })
     */
    private $afiliadoid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechadesde(): ?\DateTimeInterface
    {
        return $this->fechadesde;
    }

    public function setFechadesde(\DateTimeInterface $fechadesde): self
    {
        $this->fechadesde = $fechadesde;

        return $this;
    }

    public function getFechahasta(): ?\DateTimeInterface
    {
        return $this->fechahasta;
    }

    public function setFechahasta(?\DateTimeInterface $fechahasta): self
    {
        $this->fechahasta = $fechahasta;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getAfiliadoid(): ?Afiliados
    {
        return $this->afiliadoid;
    }

    public function setAfiliadoid(?Afiliados $afiliadoid): self
    {
        $this->afiliadoid = $afiliadoid;

        return $this;
    }


}
