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
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_fin;

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
     * @var \Montos
     *
     * @ORM\ManyToOne(targetEntity="Montos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="monto", referencedColumnName="id")
     * })
     */ 
    private $monto;

    /**
     * @ORM\OneToMany(targetEntity=Visitas::class, mappedBy="profesionalesEquipoTrabajo")
     */
    private $visitas;

    
    
    
    public function __toString() {
        return (string) $this->getId();
    }

    public function __construct()
    {
        $this->visitas = new ArrayCollection();
    }

    public function getRealizadas(): ?int
    {
        return $this->getVisitas()->count();
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


    /**
     * @return Collection|Visitas[]
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visitas $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setProfesionalesEquipoTrabajo($this);
        }

        return $this;
    }

    public function removeVisita(Visitas $visita): self
    {
        if ($this->visitas->removeElement($visita)) {
            // set the owning side to null (unless already changed)
            if ($visita->getProfesionalesEquipoTrabajo() === $this) {
                $visita->setProfesionalesEquipoTrabajo(null);
            }
        }

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(?\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fecha_fin;
    }

    public function setFechaFin(?\DateTimeInterface $fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;

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
