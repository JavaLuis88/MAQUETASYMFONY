<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservasClientes
 *
 * @ORM\Table(name="diasreservas")
 * @ORM\Entity
 */
class DiasReservas {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Date
     *
     * @ORM\Column(name="dia", type="date", nullable=false)
     */
    private $dia;

    /**
     *
     * @ORM\ManyToOne(targetEntity="ReservasClientes",inversedBy="dias",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="diareserva", referencedColumnName="id")
     * })
     */
    private $reserva;

    public function __construct() {
        
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
     * Set dia
     *
     * @param \Date $dia
     *
     * @return DiasReservas
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return \Date
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set reserva
     *
     * @param \AppBundle\Entity\ReservasClientes $reserva
     *
     * @return ReservasClientes
     */
    public function setReserva(\AppBundle\Entity\ReservasClientes $reserva = null)
    {
        $this->reserva = $reserva;

        return $this;
    }

    /**
     * Get reserva
     *
     * @return \AppBundle\Entity\ReservasClientes
     */
    public function getReserva()
    {
        return $this->reserva;
    }
}
