<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plantrabajo
 *
 * @ORM\Table(name="plantrabajo")
 * @ORM\Entity
 */
class Plantrabajo
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
     * @var int
     *
     * @ORM\Column(name="tipoProfesionalId", type="integer", nullable=false)
     */
    private $tipoprofesionalid;

    /**
     * @var int
     *
     * @ORM\Column(name="profesionalId", type="integer", nullable=false)
     */
    private $profesionalid;

    /**
     * @var int
     *
     * @ORM\Column(name="ordenPrestacionId", type="integer", nullable=false)
     */
    private $ordenprestacionid;

    /**
     * @var int
     *
     * @ORM\Column(name="cantidadVisitasPlanificadas", type="integer", nullable=false)
     */
    private $cantidadvisitasplanificadas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cantidadVisitasRealizadas", type="integer", nullable=true)
     */
    private $cantidadvisitasrealizadas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaUltimaModificacion", type="datetime", nullable=false)
     */
    private $fechaultimamodificacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tieneDocumento", type="integer", nullable=true)
     */
    private $tienedocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mesAnio", type="string", length=6, nullable=true)
     */
    private $mesanio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipoprofesionalid(): ?int
    {
        return $this->tipoprofesionalid;
    }

    public function setTipoprofesionalid(int $tipoprofesionalid): self
    {
        $this->tipoprofesionalid = $tipoprofesionalid;

        return $this;
    }

    public function getProfesionalid(): ?int
    {
        return $this->profesionalid;
    }

    public function setProfesionalid(int $profesionalid): self
    {
        $this->profesionalid = $profesionalid;

        return $this;
    }

    public function getOrdenprestacionid(): ?int
    {
        return $this->ordenprestacionid;
    }

    public function setOrdenprestacionid(int $ordenprestacionid): self
    {
        $this->ordenprestacionid = $ordenprestacionid;

        return $this;
    }

    public function getCantidadvisitasplanificadas(): ?int
    {
        return $this->cantidadvisitasplanificadas;
    }

    public function setCantidadvisitasplanificadas(int $cantidadvisitasplanificadas): self
    {
        $this->cantidadvisitasplanificadas = $cantidadvisitasplanificadas;

        return $this;
    }

    public function getCantidadvisitasrealizadas(): ?int
    {
        return $this->cantidadvisitasrealizadas;
    }

    public function setCantidadvisitasrealizadas(?int $cantidadvisitasrealizadas): self
    {
        $this->cantidadvisitasrealizadas = $cantidadvisitasrealizadas;

        return $this;
    }

    public function getFechaultimamodificacion(): ?\DateTimeInterface
    {
        return $this->fechaultimamodificacion;
    }

    public function setFechaultimamodificacion(\DateTimeInterface $fechaultimamodificacion): self
    {
        $this->fechaultimamodificacion = $fechaultimamodificacion;

        return $this;
    }

    public function getTienedocumento(): ?int
    {
        return $this->tienedocumento;
    }

    public function setTienedocumento(?int $tienedocumento): self
    {
        $this->tienedocumento = $tienedocumento;

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

    public function getMesanio(): ?string
    {
        return $this->mesanio;
    }

    public function setMesanio(?string $mesanio): self
    {
        $this->mesanio = $mesanio;

        return $this;
    }


}
