<?php

namespace App\Entity;

use App\Repository\VisitasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Visitas
 *
 * @ORM\Table(name="visitas", indexes={@ORM\Index(name="fk_visitas_ordenprestacion1_idx", columns={"ordenprestacions"}), @ORM\Index(name="fk_visitas_profesionale_equipo_trabajo1_idx", columns={"profesionale_equipo_trabajos"})})
 * @ORM\Entity(repositoryClass=VisitasRepository::class)
 */
class Visitas
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $estado_excel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_fin;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $duracion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $celular;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $afiliacion;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $afiliacion_nombre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $profesional_dni;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profesional_nombre;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $profesional_matricula;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profesional_servicio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profesional_email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $razon_social;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sap;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ugl;

    /**
     * @var \Ordenprestacion
     *
     * @ORM\ManyToOne(targetEntity="Ordenprestacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ordenprestacions", referencedColumnName="ID")
     * })
     */
    private $ordenprestacions;

    /**
     * @var \ProfesionalesEquipoTrabajo
     *
     * @ORM\ManyToOne(targetEntity="ProfesionalesEquipoTrabajo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesionale_equipo_trabajos", referencedColumnName="id")
     * })
     */
    private $profesionaleEquipoTrabajos;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_visita;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observacion;

    /**
     * @ORM\ManyToOne(targetEntity=Estado::class, inversedBy="visitas")
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity=Profesionales::class, inversedBy="visitas")
     */
    private $profesional;

    /**
     * @ORM\ManyToOne(targetEntity=ProfesionalesEquipoTrabajo::class, inversedBy="visitas")
     */
    private $profesionalesEquipoTrabajo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstadoExcel(): ?string
    {
        return $this->estado_excel;
    }

    public function setEstadoExcel(?string $estado_excel): self
    {
        $this->estado_excel = $estado_excel;

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

    public function getDuracion(): ?\DateTimeInterface
    {
        return $this->duracion;
    }

    public function setDuracion(?\DateTimeInterface $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getAfiliacion(): ?string
    {
        return $this->afiliacion;
    }

    public function setAfiliacion(?string $afiliacion): self
    {
        $this->afiliacion = $afiliacion;

        return $this;
    }

    public function getProfesionalDni(): ?int
    {
        return $this->profesional_dni;
    }

    public function setProfesionalDni(?int $profesional_dni): self
    {
        $this->profesional_dni = $profesional_dni;

        return $this;
    }

    public function getProfesionalServicio(): ?string
    {
        return $this->profesional_servicio;
    }

    public function setProfesionalServicio(?string $profesional_servicio): self
    {
        $this->profesional_servicio = $profesional_servicio;

        return $this;
    }

    public function getProfesionalEmail(): ?string
    {
        return $this->profesional_email;
    }

    public function setProfesionalEmail(?string $profesional_email): self
    {
        $this->profesional_email = $profesional_email;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razon_social;
    }

    public function setRazonSocial(?string $razon_social): self
    {
        $this->razon_social = $razon_social;

        return $this;
    }

    public function getSap(): ?string
    {
        return $this->sap;
    }

    public function setSap(?string $sap): self
    {
        $this->sap = $sap;

        return $this;
    }

    public function getUgl(): ?string
    {
        return $this->ugl;
    }

    public function setUgl(?string $ugl): self
    {
        $this->ugl = $ugl;

        return $this;
    }

    public function getNumeroVisita(): ?int
    {
        return $this->numero_visita;
    }

    public function setNumeroVisita(int $numero_visita): self
    {
        $this->numero_visita = $numero_visita;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getOrdenprestacions(): ?Ordenprestacion
    {
        return $this->ordenprestacions;
    }

    public function setOrdenprestacions(?Ordenprestacion $ordenprestacions): self
    {
        $this->ordenprestacions = $ordenprestacions;

        return $this;
    }

    public function getProfesionaleEquipoTrabajos(): ?ProfesionalesEquipoTrabajo
    {
        return $this->profesionaleEquipoTrabajos;
    }

    public function setProfesionaleEquipoTrabajos(?ProfesionalesEquipoTrabajo $profesionaleEquipoTrabajos): self
    {
        $this->profesionaleEquipoTrabajos = $profesionaleEquipoTrabajos;

        return $this;
    }

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getProfesional(): ?Profesionales
    {
        return $this->profesional;
    }

    public function setProfesional(?Profesionales $profesional): self
    {
        $this->profesional = $profesional;

        return $this;
    }

    public function getAfiliacionNombre(): ?string
    {
        return $this->afiliacion_nombre;
    }

    public function setAfiliacionNombre(?string $afiliacion_nombre): self
    {
        $this->afiliacion_nombre = $afiliacion_nombre;

        return $this;
    }

    public function getProfesionalNombre(): ?string
    {
        return $this->profesional_nombre;
    }

    public function setProfesionalNombre(?string $profesional_nombre): self
    {
        $this->profesional_nombre = $profesional_nombre;

        return $this;
    }

    public function getProfesionalMatricula(): ?int
    {
        return $this->profesional_matricula;
    }

    public function setProfesionalMatricula(?int $profesional_matricula): self
    {
        $this->profesional_matricula = $profesional_matricula;

        return $this;
    }

    public function getProfesionalesEquipoTrabajo(): ?ProfesionalesEquipoTrabajo
    {
        return $this->profesionalesEquipoTrabajo;
    }

    public function setProfesionalesEquipoTrabajo(?ProfesionalesEquipoTrabajo $profesionalesEquipoTrabajo): self
    {
        $this->profesionalesEquipoTrabajo = $profesionalesEquipoTrabajo;

        return $this;
    }


    
}
