<?php

namespace App\Entity;

use App\Repository\MontosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MontosRepository::class)
 */
class Montos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $valor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_desde;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fecha_hasta;

    /**
     * @ORM\OneToMany(targetEntity=ProfesionalesEquipoTrabajo::class, mappedBy="monto")
     */
    private $profesionalesEquipoTrabajos;
    
    
    public function __toString() {
        return (string) $this->getDescripcion().' - $'.$this->getValor();
    }

    public function __construct()
    {
        $this->profesionalesEquipoTrabajos = new ArrayCollection();
    }

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

    public function getValor(): ?string
    {
        return $this->valor;
    }

    public function setValor(string $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaDesde(): ?\DateTimeInterface
    {
        return $this->fecha_desde;
    }

    public function setFechaDesde(?\DateTimeInterface $fecha_desde): self
    {
        $this->fecha_desde = $fecha_desde;

        return $this;
    }

    public function getFechaHasta(): ?\DateTimeInterface
    {
        return $this->fecha_hasta;
    }

    public function setFechaHasta(?\DateTimeInterface $fecha_hasta): self
    {
        $this->fecha_hasta = $fecha_hasta;

        return $this;
    }

    /**
     * @return Collection|ProfesionalesEquipoTrabajo[]
     */
    public function getProfesionalesEquipoTrabajos(): Collection
    {
        return $this->profesionalesEquipoTrabajos;
    }

    public function addProfesionalesEquipoTrabajo(ProfesionalesEquipoTrabajo $profesionalesEquipoTrabajo): self
    {
        if (!$this->profesionalesEquipoTrabajos->contains($profesionalesEquipoTrabajo)) {
            $this->profesionalesEquipoTrabajos[] = $profesionalesEquipoTrabajo;
            $profesionalesEquipoTrabajo->setMonto($this);
        }

        return $this;
    }

    public function removeProfesionalesEquipoTrabajo(ProfesionalesEquipoTrabajo $profesionalesEquipoTrabajo): self
    {
        if ($this->profesionalesEquipoTrabajos->removeElement($profesionalesEquipoTrabajo)) {
            // set the owning side to null (unless already changed)
            if ($profesionalesEquipoTrabajo->getMonto() === $this) {
                $profesionalesEquipoTrabajo->setMonto(null);
            }
        }

        return $this;
    }
}
