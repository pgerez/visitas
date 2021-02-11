<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EquipoTrabajo
 *
 * @ORM\Table(name="equipo_trabajo", indexes={@ORM\Index(name="fk_equipo_trabajo_ordenprestacion1_idx", columns={"ordenprestacion"})})
 * @ORM\Entity
 */
class EquipoTrabajo
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
     * @var \Ordenprestacion
     *
     * @ORM\ManyToOne(targetEntity="Ordenprestacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ordenprestacion", referencedColumnName="ID")
     * })
     */
    private $ordenprestacion;
    
    /**
     * @Assert\NotBlank()
     * @ORM\OneToMany(targetEntity="App\Entity\ProfesionalesEquipoTrabajo", mappedBy="equipoTrabajos", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $profesionalesequipotrabajos;

    public function __construct()
    {
        $this->profesionalesequipotrabajos = new ArrayCollection();
        $this->addProfesionalesequipotrabajo(new ProfesionalesEquipoTrabajo());
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdenprestacion(): ?Ordenprestacion
    {
        return $this->ordenprestacion;
    }

    public function setOrdenprestacion(?Ordenprestacion $ordenprestacion): self
    {
        $this->ordenprestacion = $ordenprestacion;

        return $this;
    }

    /**
     * @return Collection|ProfesionalesEquipoTrabajo[]
     */
    public function getProfesionalesequipotrabajos(): Collection
    {
        return $this->profesionalesequipotrabajos;
    }

    public function addProfesionalesequipotrabajo(ProfesionalesEquipoTrabajo $profesionalesequipotrabajo): self
    {
        if (!$this->profesionalesequipotrabajos->contains($profesionalesequipotrabajo)) {
            $this->profesionalesequipotrabajos[] = $profesionalesequipotrabajo;
            $profesionalesequipotrabajo->setEquipoTrabajos($this);
        }

        return $this;
    }

    public function removeProfesionalesequipotrabajo(ProfesionalesEquipoTrabajo $profesionalesequipotrabajo): self
    {
        if ($this->profesionalesequipotrabajos->removeElement($profesionalesequipotrabajo)) {
            // set the owning side to null (unless already changed)
            if ($profesionalesequipotrabajo->getEquipoTrabajos() === $this) {
                $profesionalesequipotrabajo->setEquipoTrabajos(null);
            }
        }

        return $this;
    }




}
