<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afiliados
 *
 * @ORM\Table(name="afiliados", indexes={@ORM\Index(name="FK_afiliados_1", columns={"localidadId"}), @ORM\Index(name="FK_afiliados_2", columns={"provinciaId"}), @ORM\Index(name="FK_afiliados_3", columns={"sucursalId"}), @ORM\Index(name="FK_afiliados_4", columns={"estadoId"}), @ORM\Index(name="FK_afiliados_5", columns={"motivoBaja"})})
 * @ORM\Entity
 */
class Afiliados
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
     * @ORM\Column(name="nroAfiliado", type="string", length=50, nullable=false)
     */
    private $nroafiliado;

    /**
     * @var int
     *
     * @ORM\Column(name="tipoDocumentoId", type="integer", nullable=false)
     */
    private $tipodocumentoid;

    /**
     * @var string
     *
     * @ORM\Column(name="nroDocumento", type="string", length=10, nullable=false)
     */
    private $nrodocumento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observaciones", type="string", length=1000, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=200, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaNacimiento", type="datetime", nullable=true)
     */
    private $fechanacimiento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=1000, nullable=false)
     */
    private $direccion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaInicio", type="datetime", nullable=true)
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaModificacion", type="datetime", nullable=false)
     */
    private $fechamodificacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fechaBaja", type="datetime", nullable=true)
     */
    private $fechabaja;

    /**
     * @var \Localidades
     *
     * @ORM\ManyToOne(targetEntity="Localidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="localidadId", referencedColumnName="id")
     * })
     */
    private $localidadid;

    /**
     * @var \Provincias
     *
     * @ORM\ManyToOne(targetEntity="Provincias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinciaId", referencedColumnName="id")
     * })
     */
    private $provinciaid;

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
     * @var \Afiliadosestados
     *
     * @ORM\ManyToOne(targetEntity="Afiliadosestados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estadoId", referencedColumnName="id")
     * })
     */
    private $estadoid;

    /**
     * @var \Motivosbaja
     *
     * @ORM\ManyToOne(targetEntity="Motivosbaja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivoBaja", referencedColumnName="id")
     * })
     */
    private $motivobaja;
    
    public function __toString() 
    {
        return (string) $this->getApellido().', '.$this->getNombre();    
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNroafiliado(): ?string
    {
        return $this->nroafiliado;
    }

    public function setNroafiliado(string $nroafiliado): self
    {
        $this->nroafiliado = $nroafiliado;

        return $this;
    }

    public function getTipodocumentoid(): ?int
    {
        return $this->tipodocumentoid;
    }

    public function setTipodocumentoid(int $tipodocumentoid): self
    {
        $this->tipodocumentoid = $tipodocumentoid;

        return $this;
    }

    public function getNrodocumento(): ?string
    {
        return $this->nrodocumento;
    }

    public function setNrodocumento(string $nrodocumento): self
    {
        $this->nrodocumento = $nrodocumento;

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

    public function getFechanacimiento(): ?\DateTimeInterface
    {
        return $this->fechanacimiento;
    }

    public function setFechanacimiento(?\DateTimeInterface $fechanacimiento): self
    {
        $this->fechanacimiento = $fechanacimiento;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

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

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(?\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechamodificacion(): ?\DateTimeInterface
    {
        return $this->fechamodificacion;
    }

    public function setFechamodificacion(\DateTimeInterface $fechamodificacion): self
    {
        $this->fechamodificacion = $fechamodificacion;

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

    public function getLocalidadid(): ?Localidades
    {
        return $this->localidadid;
    }

    public function setLocalidadid(?Localidades $localidadid): self
    {
        $this->localidadid = $localidadid;

        return $this;
    }

    public function getProvinciaid(): ?Provincias
    {
        return $this->provinciaid;
    }

    public function setProvinciaid(?Provincias $provinciaid): self
    {
        $this->provinciaid = $provinciaid;

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

    public function getEstadoid(): ?Afiliadosestados
    {
        return $this->estadoid;
    }

    public function setEstadoid(?Afiliadosestados $estadoid): self
    {
        $this->estadoid = $estadoid;

        return $this;
    }

    public function getMotivobaja(): ?Motivosbaja
    {
        return $this->motivobaja;
    }

    public function setMotivobaja(?Motivosbaja $motivobaja): self
    {
        $this->motivobaja = $motivobaja;

        return $this;
    }


}
