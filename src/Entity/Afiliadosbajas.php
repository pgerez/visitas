<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afiliadosbajas
 *
 * @ORM\Table(name="afiliadosbajas", indexes={@ORM\Index(name="FK_afiliadosbajas_1", columns={"afiliadoId"}), @ORM\Index(name="FK_afiliadosbajas_2", columns={"motivoBajaId"})})
 * @ORM\Entity
 */
class Afiliadosbajas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var \Motivosbaja
     *
     * @ORM\ManyToOne(targetEntity="Motivosbaja")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="motivoBajaId", referencedColumnName="id")
     * })
     */
    private $motivobajaid;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMotivobajaid(): ?Motivosbaja
    {
        return $this->motivobajaid;
    }

    public function setMotivobajaid(?Motivosbaja $motivobajaid): self
    {
        $this->motivobajaid = $motivobajaid;

        return $this;
    }


}
