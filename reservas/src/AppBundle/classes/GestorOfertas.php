<?php

namespace AppBundle\classes;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Ofertarecinto;
use AppBundle\beans\Oferta;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorOfertas
 *
 * @author Fu-Manchu
 */
class GestorOfertas {

    //put your code here
    /**
     * @var Doctrine\Bundle\DoctrineBundle\Registry 
     */
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function getOffersPublishDay(\DateTime $date) {

        $repository = NULL;
        $query = NULL;
        $fechadia = NULL;
        $ofertasdia = NULL;
        $oferta = NULL;
        $cuenta = 0;
        $retval = NULL;

        $retval = array();




        $fechadia = $date->format("Y-m-d");
        $repository = $this->em->getRepository(Ofertarecinto::class);
        $query = $repository->createQueryBuilder('p')->where('p.fipublicacion <= :fechainicio and p.ffpublicacion >= :fechafinal and p.borrada=:borrada')->setParameter('fechainicio', $fechadia)->setParameter('fechafinal', $fechadia)->setParameter('borrada', FALSE)->getQuery();

        $ofertasdia = $query->getResult();
        $cuenta = count($ofertasdia);

        for ($i = 0; $i < $cuenta; $i++) {
            $oferta = new Oferta();
            $oferta->setId($ofertasdia[$i]->getId());
            $oferta->setPrecio($ofertasdia[$i]->getPrecio());
            $oferta->setDescripcion($ofertasdia[$i]->getDescripcion());
            $oferta->setFipublicacion($ofertasdia[$i]->getFipublicacion());
            $oferta->setFfpublicacion($ofertasdia[$i]->getFfpublicacion());
            $oferta->setFioferta($ofertasdia[$i]->getFioferta());
            $oferta->setFfoferta($ofertasdia[$i]->getFfoferta());
            $oferta->setNombrerecinto($ofertasdia[$i]->getRecinto()->getNombrerecinto());
            $oferta->setFotorecinto($ofertasdia[$i]->getRecinto()->getFoto());


            $retval[$i] = $oferta;
        }


        return $retval;
    }

    public function getDaysWithOffer(\DateTime $dateoffer) {

        $repository = NULL;
        $query = NULL;
        $fechaoferta = NULL;
        $fechadia = NULL;
        $fechahoy = NULL;
        $cuenta = 0;
        $retval = NULL;

        $retval = array();
        $fechahoy = (new \DateTime())->format("Y-m-d");
        for ($i = 1; $i <= 31; $i++) {

            $fechaoferta = new \DateTime();
            $fechaoferta->setDate($dateoffer->format("Y"), $dateoffer->format("m"), $i);
            $fechadia = $fechaoferta->format("Y-m-d");
            $repository = $this->em->getRepository(Ofertarecinto::class);
            $query = $repository->createQueryBuilder('p')->where(
                                    'p.fipublicacion <= :fechainiciopublicacion '
                                    . 'and p.ffpublicacion >= :fechafinalpublicacion '
                                    . 'and p.fioferta <= :fechainiciooferta '
                                    . 'and p.ffoferta >= :fechafinaloferta and '
                                    . 'p.borrada=:borrada')->
                            setParameter('fechainiciopublicacion', $fechahoy)->
                            setParameter('fechafinalpublicacion', $fechahoy)->
                            setParameter('fechainiciooferta', $fechadia)->
                            setParameter('fechafinaloferta', $fechadia)->
                            setParameter('borrada', FALSE)->getQuery();

            if (count($query->getResult()) >= 1) {

                $retval[$cuenta] = $i;
                $cuenta++;
            }
        }

        return $retval;
    }

    public function getOffersDay(\DateTime $dateoffer) {

        $repository = NULL;
        $query = NULL;
        $fechaoferta = NULL;
        $fechahoy = NULL;
        $oferta = NULL;
        $ofertasdia = NULL;
        $cuenta = 0;

        $retval = NULL;

        $retval = array();
        $fechahoy = (new \DateTime())->format("Y-m-d");
        $fechadia = $dateoffer->format("Y-m-d");
        $repository = $this->em->getRepository(Ofertarecinto::class);
        $query = $repository->createQueryBuilder('p')->where(
                                'p.fipublicacion <= :fechainiciopublicacion '
                                . 'and p.ffpublicacion >= :fechafinalpublicacion '
                                . 'and p.fioferta <= :fechainiciooferta '
                                . 'and p.ffoferta >= :fechafinaloferta and '
                                . 'p.borrada=:borrada')->
                        setParameter('fechainiciopublicacion', $fechahoy)->
                        setParameter('fechafinalpublicacion', $fechahoy)->
                        setParameter('fechainiciooferta', $fechadia)->
                        setParameter('fechafinaloferta', $fechadia)->
                        setParameter('borrada', FALSE)->getQuery();

        $ofertasdia = $query->getResult();
        $cuenta = count($ofertasdia);
        for ($i = 0; $i < $cuenta; $i++) {

            $oferta = new Oferta();
            $oferta->setId($ofertasdia[$i]->getId());
            $oferta->setPrecio($ofertasdia[$i]->getPrecio());
            $oferta->setDescripcion($ofertasdia[$i]->getDescripcion());
            $oferta->setFipublicacion($ofertasdia[$i]->getFipublicacion());
            $oferta->setFfpublicacion($ofertasdia[$i]->getFfpublicacion());
            $oferta->setFioferta($ofertasdia[$i]->getFioferta());
            $oferta->setFfoferta($ofertasdia[$i]->getFfoferta());
            $oferta->setNombrerecinto($ofertasdia[$i]->getRecinto()->getNombrerecinto());
            $oferta->setFotorecinto($ofertasdia[$i]->getRecinto()->getFoto());

            $retval[$i] = $oferta;
        }


        return $retval;
    }

}
