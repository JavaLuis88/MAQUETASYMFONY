<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * ReservasClientes
 *
 * @ORM\Table(name="mediosdepago")
 * @ORM\Entity
 */
class MediosDePago {

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
     * @ORM\Column(name="nombre", type="string", length=28, nullable=false,unique=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity = "ReservasClientes", mappedBy = "mediopago",cascade={"persist"})
     */
    private $reserva;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reserva = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return MediosDePago
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\ReservasClientes $reserva
     *
     * @return MediosDePago
     */
    public function addReserva(\AppBundle\Entity\ReservasClientes $reserva)
    {
        $this->reserva[] = $reserva;

        return $this;
    }

    /**
     * Remove reserva
     *
     * @param \AppBundle\Entity\ReservasClientes $reserva
     */
    public function removeReserva(\AppBundle\Entity\ReservasClientes $reserva)
    {
        $this->reserva->removeElement($reserva);
    }

    /**
     * Get reserva
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReserva()
    {
        return $this->reserva;
    }
}
