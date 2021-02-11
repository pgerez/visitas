<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modulovisita
 *
 * @ORM\Table(name="modulovisita")
 * @ORM\Entity
 */
class Modulovisita
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
     * @var int|null
     *
     * @ORM\Column(name="OrdenPrestacionTipoId", type="integer", nullable=true)
     */
    private $ordenprestaciontipoid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="moduloId", type="integer", nullable=true)
     */
    private $moduloid;

    /**
     * @var int
     *
     * @ORM\Column(name="visitaId", type="integer", nullable=false)
     */
    private $visitaid;

    /**
     * @var bool
     *
     * @ORM\Column(name="opcional", type="boolean", nullable=false)
     */
    private $opcional;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdenprestaciontipoid(): ?int
    {
        return $this->ordenprestaciontipoid;
    }

    public function setOrdenprestaciontipoid(?int $ordenprestaciontipoid): self
    {
        $this->ordenprestaciontipoid = $ordenprestaciontipoid;

        return $this;
    }

    public function getModuloid(): ?int
    {
        return $this->moduloid;
    }

    public function setModuloid(?int $moduloid): self
    {
        $this->moduloid = $moduloid;

        return $this;
    }

    public function getVisitaid(): ?int
    {
        return $this->visitaid;
    }

    public function setVisitaid(int $visitaid): self
    {
        $this->visitaid = $visitaid;

        return $this;
    }

    public function getOpcional(): ?bool
    {
        return $this->opcional;
    }

    public function setOpcional(bool $opcional): self
    {
        $this->opcional = $opcional;

        return $this;
    }


}
