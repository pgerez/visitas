<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfesionalesEquipoTrabajoRepository;

/**
 * ProfesionalesEquipoTrabajo
 *
 * @ORM\Table(name="profesionales_equipo_trabajo", indexes={@ORM\Index(name="fk_profesionale_equipo_trabajo_equipo_trabajo1_idx", columns={"equipo_trabajos"}), @ORM\Index(name="fk_profesionale_equipo_trabajo_profesionales1_idx", columns={"profesionales"})})
 * @ORM\Entity(repositoryClass=ProfesionalesEquipoTrabajoRepository::class)
 */
class ProfesionalesEquipoTrabajo
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
     * @var int|null
     *
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    private $cantidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="text", length=65535, nullable=true)
     */
    private $observaciones;

    /**
     * @var \EquipoTrabajo
     *
     * @ORM\ManyToOne(targetEntity="EquipoTrabajo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="equipo_trabajos", referencedColumnName="id")
     * })
     */
    private $equipoTrabajos;

    /**
     * @var \Profesionales
     *
     * @ORM\ManyToOne(targetEntity="Profesionales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesionales", referencedColumnName="id")
     * })
     */
    private $profesionales;


    /**
     * @ORM\ManyToOne(targetEntity=Transmision::class, inversedBy="profesionalesEquipoTrabajos")
     */
    private $transmision;

    /**
     * @ORM\ManyToOne(targetEntity=Montos::class, inversedBy="profesionalesEquipoTrabajos")
     */
    private $monto;


    public function __construct()
    {
        $this->monto = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): self
    {
        $this->cantidad = $cantidad;

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

    public function getEquipoTrabajos(): ?EquipoTrabajo
    {
        return $this->equipoTrabajos;
    }

    public function setEquipoTrabajos(?EquipoTrabajo $equipoTrabajos): self
    {
        $this->equipoTrabajos = $equipoTrabajos;

        return $this;
    }

    public function getProfesionales(): ?Profesionales
    {
        return $this->profesionales;
    }

    public function setProfesionales(?Profesionales $profesionales): self
    {
        $this->profesionales = $profesionales;

        return $this;
    }

    public function getTransmision(): ?Transmision
    {
        return $this->transmision;
    }

    public function setTransmision(?Transmision $transmision): self
    {
        $this->transmision = $transmision;

        return $this;
    }

    public function getMonto(): ?Montos
    {
        return $this->monto;
    }

    public function setMonto(?Montos $monto): self
    {
        $this->monto = $monto;

        return $this;
    }



}
