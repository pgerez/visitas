<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfesionalesRepository;

/**
 * Profesionales
 *
 * @ORM\Table(name="profesionales", indexes={@ORM\Index(name="FK_profesionales_1", columns={"profesionId"}), @ORM\Index(name="FK_profesionales_2", columns={"sucursalId"})})
 * @ORM\Entity(repositoryClass=ProfesionalesRepository::class)
 */
class Profesionales
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
     * @ORM\Column(name="dni", type="string", length=10, nullable=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellido", type="string", length=50, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Direccion", type="string", length=500, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=20, nullable=false)
     */
    private $telefono;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaNacimiento", type="datetime", nullable=true)
     */
    private $fechanacimiento;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaInicio", type="datetime", nullable=true)
     */
    private $fechainicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaBaja", type="datetime", nullable=true)
     */
    private $fechabaja;

    /**
     * @var string
     *
     * @ORM\Column(name="estadoId", type="string", length=1, nullable=false)
     */
    private $estadoid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="curriculum", type="integer", nullable=true)
     */
    private $curriculum;

    /**
     * @var \Profesiones
     *
     * @ORM\ManyToOne(targetEntity="Profesiones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesionId", referencedColumnName="id")
     * })
     */
    private $profesionid;

    /**
     * @var \Sucursales
     *
     * @ORM\ManyToOne(targetEntity="Sucursales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sucursalId", referencedColumnName="ID")
     * })
     */
    private $sucursalid;

    /**
     * @ORM\OneToMany(targetEntity=Visitas::class, mappedBy="profesional")
     */
    private $visitas;

    public function __construct()
    {
        $this->visitas = new ArrayCollection();
    }

    
    public function __toString() 
    {
        return (string) $this->getApellido().', '.$this->getNombre().' ('.$this->getProfesionid().')';
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getFechanacimiento(): ?\DateTimeInterface
    {
        return $this->fechanacimiento;
    }

    public function setFechanacimiento(?\DateTimeInterface $fechanacimiento): self
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(?\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechabaja(): ?\DateTimeInterface
    {
        return $this->fechabaja;
    }

    public function setFechabaja(?\DateTimeInterface $fechabaja): self
    {
        $this->fechabaja = $fechabaja;

        return $this;
    }

    public function getEstadoid(): ?string
    {
        return $this->estadoid;
    }

    public function setEstadoid(string $estadoid): self
    {
        $this->estadoid = $estadoid;

        return $this;
    }

    public function getCurriculum(): ?int
    {
        return $this->curriculum;
    }

    public function setCurriculum(?int $curriculum): self
    {
        $this->curriculum = $curriculum;

        return $this;
    }

    public function getProfesionid(): ?Profesiones
    {
        return $this->profesionid;
    }

    public function setProfesionid(?Profesiones $profesionid): self
    {
        $this->profesionid = $profesionid;

        return $this;
    }

    public function getSucursalid(): ?Sucursales
    {
        return $this->sucursalid;
    }

    public function setSucursalid(?Sucursales $sucursalid): self
    {
        $this->sucursalid = $sucursalid;

        return $this;
    }

    /**
     * @return Collection|Visitas[]
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visitas $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setProfesional($this);
        }

        return $this;
    }

    public function removeVisita(Visitas $visita): self
    {
        if ($this->visitas->removeElement($visita)) {
            // set the owning side to null (unless already changed)
            if ($visita->getProfesional() === $this) {
                $visita->setProfesional(null);
            }
        }

        return $this;
    }


}
