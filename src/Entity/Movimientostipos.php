<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimientostipos
 *
 * @ORM\Table(name="movimientostipos")
 * @ORM\Entity
 */
class Movimientostipos
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
     * @ORM\Column(name="entidad", type="string", length=2, nullable=false)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="string", length=5, nullable=false)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntidad(): ?string
    {
        return $this->entidad;
    }

    public function setEntidad(string $entidad): self
    {
        $this->entidad = $entidad;

        return $this;
    }

    public function getResumen(): ?string
    {
        return $this->resumen;
    }

    public function setResumen(string $resumen): self
    {
        $this->resumen = $resumen;

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


}
