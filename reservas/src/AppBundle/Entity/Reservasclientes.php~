<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ReservasClientes
 *
 * @ORM\Table(name="reservasclientes")
 * @ORM\Entity
 */
class ReservasClientes {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=35, nullable=false)
     * @Assert\NotBlank(message="nombre.no.vacio")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=35, nullable=false)
     * @Assert\NotBlank(message="apellidos.no.vacio")
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=128, nullable=false)
     * @Assert\NotBlank(message="direccion.no.vacia")
     */
    private $direccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="borrada", type="boolean", nullable=false)
     */
    private $borrada;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Recintos",inversedBy="reservas",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recintoid", referencedColumnName="id")
     * })
     */
    private $recinto;

    /**
     *
     * @ORM\ManyToOne(targetEntity="MediosDePago",inversedBy="reserva",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mediodepagoid", referencedColumnName="id")
     * })
     * 
     */
    private $mediopago;

    /**
     * @ORM\OneToMany(targetEntity = "DiasReservas", mappedBy = "reserva",cascade={"persist"})
     */
    private $dias;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Ofertarecinto",inversedBy="reservacliente",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ofertareservaid", referencedColumnName="id")
     * })
     */
    private $ofertareserva = NULL;

    public function __construct() {

        $this->dias = new ArrayCollection();
        $this->precio = 0;
        $this->nombre = "";
        $this->apellidos = "";
        $this->direccion = "";
        $this->borrada = FALSE;
        $this->mediopago = NULL;
        $this->ofertareserva = NULL;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return ReservasClientes
     */
    public function setPrecio($precio) {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return ReservasClientes
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return ReservasClientes
     */
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos() {
        return $this->apellidos;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return ReservasClientes
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Set borrada
     *
     * @param boolean $borrada
     *
     * @return ReservasClientes
     */
    public function setBorrada($borrada) {
        $this->borrada = $borrada;

        return $this;
    }

    /**
     * Get borrada
     *
     * @return boolean
     */
    public function getBorrada() {
        return $this->borrada;
    }

    /**
     * Set recinto
     *
     * @param \AppBundle\Entity\Recintos $recinto
     *
     * @return ReservasClientes
     */
    public function setRecinto(\AppBundle\Entity\Recintos $recinto = null) {
        $this->recinto = $recinto;

        return $this;
    }

    /**
     * Get recinto
     *
     * @return \AppBundle\Entity\Recintos
     */
    public function getRecinto() {
        return $this->recinto;
    }

    /**
     * Set mediopago
     *
     * @param \AppBundle\Entity\MediosDePago $mediopago
     *
     * @return ReservasClientes
     */
    public function setMediopago(\AppBundle\Entity\MediosDePago $mediopago = null) {
        $this->mediopago = $mediopago;

        return $this;
    }

    /**
     * Get mediopago
     *
     * @return \AppBundle\Entity\MediosDePago
     */
    public function getMediopago() {
        return $this->mediopago;
    }

    /**
     * Add dia
     *
     * @param \AppBundle\Entity\DiasReservas $dia
     *
     * @return ReservasClientes
     */
    public function addDia(\AppBundle\Entity\DiasReservas $dia) {
        $this->dias[] = $dia;

        return $this;
    }

    /**
     * Remove dia
     *
     * @param \AppBundle\Entity\DiasReservas $dia
     */
    public function removeDia(\AppBundle\Entity\DiasReservas $dia) {
        $this->dias->removeElement($dia);
    }

    /**
     * Get dias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDias() {
        return $this->dias;
    }

    /**
     * Set ofertareserva
     *
     * @param \AppBundle\Entity\Ofertarecinto $ofertareserva
     *
     * @return ReservasClientes
     */
    public function setOfertareserva(\AppBundle\Entity\Ofertarecinto $ofertareserva = null) {
        $this->ofertareserva = $ofertareserva;

        return $this;
    }

    /**
     * Get ofertareserva
     *
     * @return \AppBundle\Entity\Ofertarecinto
     */
    public function getOfertareserva() {
        return $this->ofertareserva;
    }

}
