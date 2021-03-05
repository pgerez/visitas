<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ordenprestacion
 *
 * @ORM\Table(name="ordenprestacion", indexes={@ORM\Index(name="FK_ordenprestacion_1", columns={"afiliadoId"}), @ORM\Index(name="FK_ordenprestacion_2", columns={"planId"}), @ORM\Index(name="FK_ordenprestacion_3", columns={"tipo"})})
 * @ORM\Entity
 */
class Ordenprestacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=20, nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vigenciaDesde", type="datetime", nullable=false)
     */
    private $vigenciadesde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vigenciaHasta", type="datetime", nullable=false)
     */
    private $vigenciahasta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="string", length=1000, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=2, nullable=false)
     */
    private $estado;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="documento", type="boolean", nullable=true)
     */
    private $documento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="visitaId", type="integer", nullable=true)
     */
    private $visitaid;

    /**
     * @var \Afiliados
     *
     * @ORM\ManyToOne(targetEntity="Afiliados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="afiliadoId", referencedColumnName="id")
     * })
     */
    private $afiliadoid;

    /**
     * @var \Planes
     *
     * @ORM\ManyToOne(targetEntity="Planes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="planId", referencedColumnName="Id")
     * })
     */
    private $planid;

    /**
     * @var \Ordenprestaciontipo
     *
     * @ORM\ManyToOne(targetEntity="Ordenprestaciontipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo", referencedColumnName="id")
     * })
     */
    private $tipo;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="App\Entity\EquipoTrabajo", mappedBy="ordenprestacion", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $equipos;

    /**
     * @ORM\ManyToOne(targetEntity=Modulo::class, inversedBy="ordenprestacions")
     */
    private $modulo;
    
    public function __toString() 
    {
        return (string) $this->getNumero();
    }

    public function __construct()
    {
        $this->equipos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getVigenciadesde(): ?\DateTimeInterface
    {
        return $this->vigenciadesde;
    }

    public function setVigenciadesde(\DateTimeInterface $vigenciadesde): self
    {
        $this->vigenciadesde = $vigenciadesde;

        return $this;
    }

    public function getVigenciahasta(): ?\DateTimeInterface
    {
        return $this->vigenciahasta;
    }

    public function setVigenciahasta(\DateTimeInterface $vigenciahasta): self
    {
        $this->vigenciahasta = $vigenciahasta;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDocumento(): ?bool
    {
        return $this->documento;
    }

    public function setDocumento(?bool $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getVisitaid(): ?int
    {
        return $this->visitaid;
    }

    public function setVisitaid(?int $visitaid): self
    {
        $this->visitaid = $visitaid;

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

    public function getPlanid(): ?Planes
    {
        return $this->planid;
    }

    public function setPlanid(?Planes $planid): self
    {
        $this->planid = $planid;

        return $this;
    }

    public function getTipo(): ?Ordenprestaciontipo
    {
        return $this->tipo;
    }

    public function setTipo(?Ordenprestaciontipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection|EquipoTrabajo[]
     */
    public function getEquipos(): Collection
    {
        return $this->equipos;
    }

    public function addEquipo(EquipoTrabajo $equipo): self
    {
        if (!$this->equipos->contains($equipo)) {
            $this->equipos[] = $equipo;
            $equipo->setOrdenprestacion($this);
        }

        return $this;
    }

    public function removeEquipo(EquipoTrabajo $equipo): self
    {
        if ($this->equipos->removeElement($equipo)) {
            // set the owning side to null (unless already changed)
            if ($equipo->getOrdenprestacion() === $this) {
                $equipo->setOrdenprestacion(null);
            }
        }

        return $this;
    }

    public function getModulo(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModulo(?Modulo $modulo): self
    {
        $this->modulo = $modulo;

        return $this;
    }



}
