<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historiaclinica
 *
 * @ORM\Table(name="historiaclinica", indexes={@ORM\Index(name="FK_historiaclinica_1", columns={"afiliadoId"}), @ORM\Index(name="FK_historiaclinica_2", columns={"diagnosticoId"}), @ORM\Index(name="FK_historiaclinica_3", columns={"opId"})})
 * @ORM\Entity
 */
class Historiaclinica
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
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="string", length=200, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoId", type="string", length=1, nullable=false)
     */
    private $estadoid;

    /**
     * @var \Afiliados
     *
     * @ORM\ManyToOne(targetEntity="Afiliados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afiliadoId", referencedColumnName="id")
     * })
     */
    private $afiliadoid;

    /**
     * @var \Diagnosticos
     *
     * @ORM\ManyToOne(targetEntity="Diagnosticos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="diagnosticoId", referencedColumnName="id")
     * })
     */
    private $diagnosticoid;

    /**
     * @var \Ordenprestacion
     *
     * @ORM\ManyToOne(targetEntity="Ordenprestacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="opId", referencedColumnName="ID")
     * })
     */
    private $opid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getEstadoid(): ?string
    {
        return $this->estadoid;
    }

    public function setEstadoid(string $estadoid): self
    {
        $this->estadoid = $estadoid;

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

    public function getDiagnosticoid(): ?Diagnosticos
    {
        return $this->diagnosticoid;
    }

    public function setDiagnosticoid(?Diagnosticos $diagnosticoid): self
    {
        $this->diagnosticoid = $diagnosticoid;

        return $this;
    }

    public function getOpid(): ?Ordenprestacion
    {
        return $this->opid;
    }

    public function setOpid(?Ordenprestacion $opid): self
    {
        $this->opid = $opid;

        return $this;
    }


}
