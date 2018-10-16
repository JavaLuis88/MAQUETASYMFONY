<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Recintos
 *
 * @ORM\Table(name="recintos")
 * @ORM\Entity
 */
class Recintos {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=15, nullable=false,unique=true)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrerecinto", type="string", length=25, nullable=false)
     */
    private $nombrerecinto;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=125, nullable=false)
     */
    private $direccion;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=128, nullable=true)
     */
    private $foto;

    /**
     * @ORM\OneToMany(targetEntity="Ofertarecinto", mappedBy="recinto",cascade={"persist"})
     */
    private $oferta;

    /**
     * @ORM\OneToMany(targetEntity = "ReservasClientes", mappedBy = "recinto",cascade={"persist"})
     */
    private $reservas;

    public function __construct() {
        $this->oferta = new ArrayCollection();
        $this->reservas = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return Recintos
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set nombrerecinto
     *
     * @param string $nombrerecinto
     *
     * @return Recintos
     */
    public function setNombrerecinto($nombrerecinto)
    {
        $this->nombrerecinto = $nombrerecinto;

        return $this;
    }

    /**
     * Get nombrerecinto
     *
     * @return string
     */
    public function getNombrerecinto()
    {
        return $this->nombrerecinto;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Recintos
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Recintos
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Recintos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Recintos
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Add ofertum
     *
     * @param \AppBundle\Entity\Ofertarecinto $ofertum
     *
     * @return Recintos
     */
    public function addOfertum(\AppBundle\Entity\Ofertarecinto $ofertum)
    {
        $this->oferta[] = $ofertum;

        return $this;
    }

    /**
     * Remove ofertum
     *
     * @param \AppBundle\Entity\Ofertarecinto $ofertum
     */
    public function removeOfertum(\AppBundle\Entity\Ofertarecinto $ofertum)
    {
        $this->oferta->removeElement($ofertum);
    }

    /**
     * Get oferta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\ReservasClientes $reserva
     *
     * @return Recintos
     */
    public function addReserva(\AppBundle\Entity\ReservasClientes $reserva)
    {
        $this->reservas[] = $reserva;

        return $this;
    }

    /**
     * Remove reserva
     *
     * @param \AppBundle\Entity\ReservasClientes $reserva
     */
    public function removeReserva(\AppBundle\Entity\ReservasClientes $reserva)
    {
        $this->reservas->removeElement($reserva);
    }

    /**
     * Get reservas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservas()
    {
        return $this->reservas;
    }
}
