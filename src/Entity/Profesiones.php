<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesiones
 *
 * @ORM\Table(name="profesiones")
 * @ORM\Entity
 */
class Profesiones
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
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=false)
     */
    private $descripcion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="adicionalId", type="integer", nullable=true)
     */
    private $adicionalid;
    
    public function __toString() 
    {
        return (string) $this->getDescripcion();
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

    public function getAdicionalid(): ?int
    {
        return $this->adicionalid;
    }

    public function setAdicionalid(?int $adicionalid): self
    {
        $this->adicionalid = $adicionalid;

        return $this;
    }


}
