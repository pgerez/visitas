<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesionalesmovimientos
 *
 * @ORM\Table(name="profesionalesmovimientos")
 * @ORM\Entity
 */
class Profesionalesmovimientos
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
     * @ORM\Column(name="tipoMovimientoId", type="integer", nullable=false)
     */
    private $tipomovimientoid;

    /**
     * @var int
     *
     * @ORM\Column(name="usuarioId", type="integer", nullable=false)
     */
    private $usuarioid;

    /**
     * @var int
     *
     * @ORM\Column(name="profesionalId", type="integer", nullable=false)
     */
    private $profesionalid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHora", type="datetime", nullable=false)
     */
    private $fechahora;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipomovimientoid(): ?int
    {
        return $this->tipomovimientoid;
    }

    public function setTipomovimientoid(int $tipomovimientoid): self
    {
        $this->tipomovimientoid = $tipomovimientoid;

        return $this;
    }

    public function getUsuarioid(): ?int
    {
        return $this->usuarioid;
    }

    public function setUsuarioid(int $usuarioid): self
    {
        $this->usuarioid = $usuarioid;

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

    public function getFechahora(): ?\DateTimeInterface
    {
        return $this->fechahora;
    }

    public function setFechahora(\DateTimeInterface $fechahora): self
    {
        $this->fechahora = $fechahora;

        return $this;
    }


}
