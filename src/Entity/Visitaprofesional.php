<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitaprofesional
 *
 * @ORM\Table(name="visitaprofesional", indexes={@ORM\Index(name="FK_visitaprofesional_1", columns={"profesionId"}), @ORM\Index(name="FK_visitaprofesional_2", columns={"visitaMedidaId"}), @ORM\Index(name="FK_visitaprofesional_3", columns={"visitaPeriodoId"})})
 * @ORM\Entity
 */
class Visitaprofesional
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
     * @ORM\Column(name="cantidad", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var \Profesionales
     *
     * @ORM\ManyToOne(targetEntity="Profesionales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesionId", referencedColumnName="id")
     * })
     */
    private $profesionid;

    /**
     * @var \Visitamedidas
     *
     * @ORM\ManyToOne(targetEntity="Visitamedidas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitaMedidaId", referencedColumnName="id")
     * })
     */
    private $visitamedidaid;

    /**
     * @var \Visitaperiodos
     *
     * @ORM\ManyToOne(targetEntity="Visitaperiodos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visitaPeriodoId", referencedColumnName="id")
     * })
     */
    private $visitaperiodoid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getProfesionid(): ?Profesionales
    {
        return $this->profesionid;
    }

    public function setProfesionid(?Profesionales $profesionid): self
    {
        $this->profesionid = $profesionid;

        return $this;
    }

    public function getVisitamedidaid(): ?Visitamedidas
    {
        return $this->visitamedidaid;
    }

    public function setVisitamedidaid(?Visitamedidas $visitamedidaid): self
    {
        $this->visitamedidaid = $visitamedidaid;

        return $this;
    }

    public function getVisitaperiodoid(): ?Visitaperiodos
    {
        return $this->visitaperiodoid;
    }

    public function setVisitaperiodoid(?Visitaperiodos $visitaperiodoid): self
    {
        $this->visitaperiodoid = $visitaperiodoid;

        return $this;
    }


}
