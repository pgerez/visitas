<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Motivosbaja
 *
 * @ORM\Table(name="motivosbaja")
 * @ORM\Entity
 */
class Motivosbaja
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
