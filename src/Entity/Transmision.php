<?php

namespace App\Entity;

use App\Repository\TransmisionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransmisionRepository::class)
 */
class Transmision
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=Modulo::class, inversedBy="transmisions")
     */
    private $modulo;

    /**
     * @ORM\OneToMany(targetEntity=ProfesionalesEquipoTrabajo::class, mappedBy="transmision")
     */
    private $profesionalesEquipoTrabajos;


    public function __toString() 
    {
        return (string) $this->getCodigo().' - '.$this->getDescripcion();
    }
    
    public function __construct()
    {
        $this->modulo = new ArrayCollection();
        $this->profesionalesEquipoTrabajoTransmisions = new ArrayCollection();
        $this->profesionalesEquipoTrabajos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
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

    public function getModulo(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModulo(?Modulo $modulo): self
    {
        $this->modulo = $modulo;

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
            $profesionalesEquipoTrabajo->setTransmision($this);
        }

        return $this;
    }

    public function removeProfesionalesEquipoTrabajo(ProfesionalesEquipoTrabajo $profesionalesEquipoTrabajo): self
    {
        if ($this->profesionalesEquipoTrabajos->removeElement($profesionalesEquipoTrabajo)) {
            // set the owning side to null (unless already changed)
            if ($profesionalesEquipoTrabajo->getTransmision() === $this) {
                $profesionalesEquipoTrabajo->setTransmision(null);
            }
        }

        return $this;
    }

}
