<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidades
 *
 * @ORM\Table(name="localidades", indexes={@ORM\Index(name="FK_localidades_2", columns={"departamento_id"})})
 * @ORM\Entity
 */
class Localidades
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
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var \Departamentos
     *
     * @ORM\ManyToOne(targetEntity="Departamentos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="departamento_id", referencedColumnName="id")
     * })
     */
    private $departamento;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDepartamento(): ?Departamentos
    {
        return $this->departamento;
    }

    public function setDepartamento(?Departamentos $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }


}
