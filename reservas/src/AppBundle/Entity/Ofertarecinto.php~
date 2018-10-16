<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ofertarecinto
 *
 * @ORM\Table(name="ofertarecinto")
 * @ORM\Entity
 */
class Ofertarecinto {

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
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fipublicacion", type="date", nullable=false)
     */
    private $fipublicacion;

    /**
     * @var \Date
     *
     * @ORM\Column(name="ffpublicacion", type="date", nullable=false)
     */
    private $ffpublicacion;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fioferta", type="date", nullable=false)
     */
    private $fioferta;

    /**
     * @var \Date
     *
     * @ORM\Column(name="ffoferta", type="date", nullable=false)
     */
    private $ffoferta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="borrada", type="boolean", nullable=false)
     */
    private $borrada;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Recintos",inversedBy="oferta",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="recintoid", referencedColumnName="id")
     * })
     */
    private $recinto;

    /**
     * @ORM\OneToMany(targetEntity = "ReservasClientes", mappedBy = "ofertareserva",cascade={"persist"})
     */
    private $reservacliente;

    public function __construct() {
        $this->reserva = new ArrayCollection();
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
     * Set precio
     *
     * @param float $precio
     *
     * @return Ofertarecinto
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
     * @return Ofertarecinto
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
     * Set fipublicacion
     *
     * @param \Date $fipublicacion
     *
     * @return Ofertarecinto
     */
    public function setFipublicacion($fipublicacion)
    {
        $this->fipublicacion = $fipublicacion;

        return $this;
    }

    /**
     * Get fipublicacion
     *
     * @return \Date
     */
    public function getFipublicacion()
    {
        return $this->fipublicacion;
    }

    /**
     * Set ffpublicacion
     *
     * @param \Date $ffpublicacion
     *
     * @return Ofertarecinto
     */
    public function setFfpublicacion($ffpublicacion)
    {
        $this->ffpublicacion = $ffpublicacion;

        return $this;
    }

    /**
     * Get ffpublicacion
     *
     * @return \Date
     */
    public function getFfpublicacion()
    {
        return $this->ffpublicacion;
    }

    /**
     * Set fioferta
     *
     * @param \Date $fioferta
     *
     * @return Ofertarecinto
     */
    public function setFioferta($fioferta)
    {
        $this->fioferta = $fioferta;

        return $this;
    }

    /**
     * Get fioferta
     *
     * @return \Date
     */
    public function getFioferta()
    {
        return $this->fioferta;
    }

    /**
     * Set ffoferta
     *
     * @param \Date $ffoferta
     *
     * @return Ofertarecinto
     */
    public function setFfoferta($ffoferta)
    {
        $this->ffoferta = $ffoferta;

        return $this;
    }

    /**
     * Get ffoferta
     *
     * @return \Date
     */
    public function getFfoferta()
    {
        return $this->ffoferta;
    }

    /**
     * Set borrada
     *
     * @param boolean $borrada
     *
     * @return Ofertarecinto
     */
    public function setBorrada($borrada)
    {
        $this->borrada = $borrada;

        return $this;
    }

    /**
     * Get borrada
     *
     * @return boolean
     */
    public function getBorrada()
    {
        return $this->borrada;
    }

    /**
     * Set recinto
     *
     * @param \AppBundle\Entity\Recintos $recinto
     *
     * @return Ofertarecinto
     */
    public function setRecinto(\AppBundle\Entity\Recintos $recinto = null)
    {
        $this->recinto = $recinto;

        return $this;
    }

    /**
     * Get recinto
     *
     * @return \AppBundle\Entity\Recintos
     */
    public function getRecinto()
    {
        return $this->recinto;
    }

    /**
     * Add reservacliente
     *
     * @param \AppBundle\Entity\ReservasClientes $reservacliente
     *
     * @return Ofertarecinto
     */
    public function addReservacliente(\AppBundle\Entity\ReservasClientes $reservacliente)
    {
        $this->reservacliente[] = $reservacliente;

        return $this;
    }

    /**
     * Remove reservacliente
     *
     * @param \AppBundle\Entity\ReservasClientes $reservacliente
     */
    public function removeReservacliente(\AppBundle\Entity\ReservasClientes $reservacliente)
    {
        $this->reservacliente->removeElement($reservacliente);
    }

    /**
     * Get reservacliente
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservacliente()
    {
        return $this->reservacliente;
    }
}
