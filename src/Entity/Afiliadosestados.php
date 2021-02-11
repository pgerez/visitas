<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afiliadosestados
 *
 * @ORM\Table(name="afiliadosestados")
 * @ORM\Entity
 */
class Afiliadosestados
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
     * @ORM\Column(name="descripcion", type="string", length=60, nullable=false)
     */
    private $descripcion;

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


}
