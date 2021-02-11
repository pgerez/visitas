<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitas
 *
 * @ORM\Table(name="visitas", indexes={@ORM\Index(name="fk_visitas_ordenprestacion1_idx", columns={"ordenprestacions"}), @ORM\Index(name="fk_visitas_profesionale_equipo_trabajo1_idx", columns={"profesionale_equipo_trabajos"})})
 * @ORM\Entity
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

    public function getId(): ?int
    {
        return $this->id;
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


}
