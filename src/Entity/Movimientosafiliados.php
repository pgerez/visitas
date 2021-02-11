<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimientosafiliados
 *
 * @ORM\Table(name="movimientosafiliados", indexes={@ORM\Index(name="FK_movimientosafiliados_1", columns={"afiliadoId"})})
 * @ORM\Entity
 */
class Movimientosafiliados
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
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=500, nullable=false)
     */
    private $mensaje;

    /**
     * @var int
     *
     * @ORM\Column(name="usuarioId", type="integer", nullable=false)
     */
    private $usuarioid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaHora", type="datetime", nullable=false)
     */
    private $fechahora;

    /**
     * @var \Afiliados
     *
     * @ORM\ManyToOne(targetEntity="Afiliados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afiliadoId", referencedColumnName="id")
     * })
     */
    private $afiliadoid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMensaje(): ?string
    {
        return $this->mensaje;
    }

    public function setMensaje(string $mensaje): self
    {
        $this->mensaje = $mensaje;

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

    public function getFechahora(): ?\DateTimeInterface
    {
        return $this->fechahora;
    }

    public function setFechahora(\DateTimeInterface $fechahora): self
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    public function getAfiliadoid(): ?Afiliados
    {
        return $this->afiliadoid;
    }

    public function setAfiliadoid(?Afiliados $afiliadoid): self
    {
        $this->afiliadoid = $afiliadoid;

        return $this;
    }


}
