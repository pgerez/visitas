<?php

namespace App\Entity;

use App\Repository\ModuloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuloRepository::class)
 */
class Modulo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codigo_modulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion_modulo;

    /**
     * @ORM\Column(type="integer")
     */
    private $codigo_practica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion_practica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solicitud;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $renovacion;

    /**
     * @ORM\OneToMany(targetEntity=Transmision::class, mappedBy="modulo", cascade={"all"}, orphanRemoval=true)
     */
    private $transmisions;

    /**
     * @ORM\OneToMany(targetEntity=Ordenprestacion::class, mappedBy="modulo")
     */
    private $ordenprestacions;

    
    public function __toString() 
    {
        return (string) $this->getCodigoModulo().' - '.$this->getDescripcionModulo();
    }
    
    public function __construct()
    {
        $this->transmisions = new ArrayCollection();
        $this->ordenprestacions = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigoModulo(): ?int
    {
        return $this->codigo_modulo;
    }

    public function setCodigoModulo(int $codigo_modulo): self
    {
        $this->codigo_modulo = $codigo_modulo;

        return $this;
    }

    public function getDescripcionModulo(): ?string
    {
        return $this->descripcion_modulo;
    }

    public function setDescripcionModulo(string $descripcion_modulo): self
    {
        $this->descripcion_modulo = $descripcion_modulo;

        return $this;
    }

    public function getCodigoPractica(): ?int
    {
        return $this->codigo_practica;
    }

    public function setCodigoPractica(int $codigo_practica): self
    {
        $this->codigo_practica = $codigo_practica;

        return $this;
    }

    public function getDescripcionPractica(): ?string
    {
        return $this->descripcion_practica;
    }

    public function setDescripcionPractica(string $descripcion_practica): self
    {
        $this->descripcion_practica = $descripcion_practica;

        return $this;
    }

    public function getSolicitud(): ?string
    {
        return $this->solicitud;
    }

    public function setSolicitud(string $solicitud): self
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    public function getRenovacion(): ?string
    {
        return $this->renovacion;
    }

    public function setRenovacion(string $renovacion): self
    {
        $this->renovacion = $renovacion;

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
            $transmision->setModulo($this);
        }

        return $this;
    }

    public function removeTransmision(Transmision $transmision): self
    {
        if ($this->transmisions->removeElement($transmision)) {
            // set the owning side to null (unless already changed)
            if ($transmision->getModulo() === $this) {
                $transmision->setModulo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ordenprestacion[]
     */
    public function getOrdenprestacions(): Collection
    {
        return $this->ordenprestacions;
    }

    public function addOrdenprestacion(Ordenprestacion $ordenprestacion): self
    {
        if (!$this->ordenprestacions->contains($ordenprestacion)) {
            $this->ordenprestacions[] = $ordenprestacion;
            $ordenprestacion->setModulo($this);
        }

        return $this;
    }

    public function removeOrdenprestacion(Ordenprestacion $ordenprestacion): self
    {
        if ($this->ordenprestacions->removeElement($ordenprestacion)) {
            // set the owning side to null (unless already changed)
            if ($ordenprestacion->getModulo() === $this) {
                $ordenprestacion->setModulo(null);
            }
        }

        return $this;
    }
}
