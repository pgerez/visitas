<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Extras
 *
 * @ORM\Table(name="extras")
 * @ORM\Entity
 */
class Extras
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
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviatura", type="string", length=4, nullable=true)
     */
    private $abreviatura;

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

    public function getAbreviatura(): ?string
    {
        return $this->abreviatura;
    }

    public function setAbreviatura(?string $abreviatura): self
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }


}
