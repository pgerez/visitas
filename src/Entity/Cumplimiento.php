<?php

namespace App\Entity;

use App\Repository\CumplimientoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CumplimientoRepository::class)
 */
class Cumplimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $practica;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="integer")
     */
    private $parcial;

    /**
     * @ORM\Column(type="integer")
     */
    private $nulo;

    /**
     * @ORM\OneToMany(targetEntity=Transmision::class, mappedBy="cumplimiento")
     */
    private $transmisions;
    
    public function __toString() {
        return (string) $this->getModulo().'-'.$this->getPractica().'('.$this->getTotal().'|'.$this->getParcial().'|'.$this->getNulo().')';
    }

    public function __construct()
    {
        $this->transmisions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModulo(): ?string
    {
        return $this->modulo;
    }

    public function setModulo(string $modulo): self
    {
        $this->modulo = $modulo;

        return $this;
    }

    public function getPractica(): ?string
    {
        return $this->practica;
    }

    public function setPractica(string $practica): self
    {
        $this->practica = $practica;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getParcial(): ?int
    {
        return $this->parcial;
    }

    public function setParcial(int $parcial): self
    {
        $this->parcial = $parcial;

        return $this;
    }

    public function getNulo(): ?int
    {
        return $this->nulo;
    }

    public function setNulo(int $nulo): self
    {
        $this->nulo = $nulo;

        return $this;
    }

    /**
     * @return Collection|Transmision[]
     */
    public function getTransmisions(): Collection
    {
        return $this->transmisions;
    }

    public function addTransmision(Transmision $transmision): self
    {
        if (!$this->transmisions->contains($transmision)) {
            $this->transmisions[] = $transmision;
            $transmision->setCumplimiento($this);
        }

        return $this;
    }

    public function removeTransmision(Transmision $transmision): self
    {
        if ($this->transmisions->removeElement($transmision)) {
            // set the owning side to null (unless already changed)
            if ($transmision->getCumplimiento() === $this) {
                $transmision->setCumplimiento(null);
            }
        }

        return $this;
    }
}
