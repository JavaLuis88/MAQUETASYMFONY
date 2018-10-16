<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\ReservasClientes;
use AppBundle\Entity\Ofertarecinto;
use AppBundle\Entity\DiasReservas;
use AppBundle\type\ReservasClientesType;

class DefaultController extends Controller {

    public function indexAction(Request $request) {



        return $this->redirectToRoute('homepagelanguage', array('_locale' => 'es'));
    }

    public function homepagelanguageAction(Request $request, $_route, $_locale) {

        $gestorofertas = NULL;
        $ofertas = NULL;
        $datospropios = NULL;
        $retval = NULL;

        $gestorofertas = $this->container->get("ServicioGestorOfertas");
        $ofertas = $gestorofertas->getOffersPublishDay(new \DateTime());
        $datospropios = array();
        $datospropios["ofertas"] = $ofertas;
        $retval = $this->render('@App/index.html.twig', array('datoscomun' => $this->getComunData($_route, $_locale), 'datospropios' => $datospropios, 'errores' => NULL));

        return $retval;
    }

    public function calendarofferAction(Request $request, $_route, $_locale) {

        $retval = NULL;

        $retval = $this->render('@App/calendar.html.twig', array('datoscomun' => $this->getComunData($_route, $_locale), 'datospropios' => NULL, 'errores' => NULL));
        return $retval;
    }

    public function ajaxurlAction(Request $request, $_route, $_locale) {

        $retval = NULL;

        $retval = new Response($this->renderView('@App/ajaxurl.html.twig', array('datoscomun' => $this->getComunData($_route, $_locale), 'datospropios' => NULL, 'errores' => NULL)));
        $retval->headers->set("Content-type", "text/javascript");
        return $retval;
    }

    public function languageAction(Request $request, $_route, $_locale) {
        $gestorlenguajes = NULL;
        $datospropios = NULL;
        $retval = NULL;

        $datospropios = array();

        $gestorlenguajes = $this->container->get("ServicioGestorLenguaje");
        $datospropios["languageslist"] = $gestorlenguajes->getAppLanguages();
        $datospropios["languagefile"] = $gestorlenguajes->getLanguageFile($_locale);
        $retval = new Response($this->renderView('@App/language.html.twig', array('datoscomun' => $this->getComunData($_route, $_locale), 'datospropios' => $datospropios, 'errores' => NULL)));
        $retval->headers->set("Content-type", "text/javascript");
        return $retval;
    }

    public function getdayswithofferAction(Request $request, $_route, $_locale) {


        $gestorofertas = NULL;
        $fecha = NULL;
        $diasconoferta = TRUE;
        $resultado = NULL;
        $retval = NULL;




        if ($request->request->get("month") == null || $request->request->get("year") == null) {
            $resultado = array();
        } else {
            try {
                $fecha = new \DateTime($request->request->get("year") . "-" . $request->request->get("month") . "-1");
                $gestorofertas = $this->container->get("ServicioGestorOfertas");
                $resultado = $gestorofertas->getDaysWithOffer($fecha);
            } catch (Exception $e) {
                $resultado = array();
            }
        }

        $retval = new Response(json_encode($resultado));
        $retval->headers->set("Content-type", "text/json");

        return $retval;
    }

    public function getoffersdayAction(Request $request, $_route, $_locale) {


        $gestorofertas = NULL;
        $fecha = NULL;
        $diasconoferta = TRUE;
        $resultado = NULL;
        $retval = NULL;




        if ($request->request->get("fecha") == null) {
            $resultado = array();
        } else {
            try {
                $fecha = new \DateTime($request->request->get("fecha"));
                $gestorofertas = $this->container->get("ServicioGestorOfertas");
                $resultado = $gestorofertas->getOffersDay($fecha);
            } catch (Exception $e) {
                $resultado = array();
            }
        }

        $retval = new Response(json_encode($resultado));

        return $retval;
    }

    public function reservationAction(Request $request, $_route, $_locale, $idoferta) {
        $reserva = NULL;
        $formularioreserva = NULL;
        $query = NULL;
        $oferta = NULL;
        $fecha = NULL;
        $fecha2 = NULL;
        $cadenafecha = "";
        $cadenafecha2 = "";
        $repository = NULL;
        $datospropios = NULL;
        $diasreservas = NULL;
        $errores = 0;
        $retval = NULL;
        $em = NULL;


        $datospropios = array();
        $datospropios["idoferta"] = $idoferta;

        $fecha = new \DateTime();


        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository(Ofertarecinto::class);
        $query = $repository->createQueryBuilder('p')->where(
                                'p.fipublicacion <= :fechainiciopublicacion '
                                . 'and p.ffpublicacion >= :fechafinalpublicacion '
                                . 'and p.id = :idoferta '
                                . 'and p.borrada=:borrada')->
                        setParameter('fechainiciopublicacion', $fecha->format('Y-m-d'))->
                        setParameter('fechafinalpublicacion', $fecha->format('Y-m-d'))->
                        setParameter('idoferta', $idoferta)->
                        setParameter('borrada', FALSE)->getQuery();
        $oferta = $query->getOneOrNullResult();
        if ($oferta) {


            $reserva = new ReservasClientes();


            $formularioreserva = $this->createForm(ReservasClientesType::class, $reserva);
            $formularioreserva->handleRequest($request);
            if ($formularioreserva->isSubmitted() && $formularioreserva->isValid()) {




                $reserva->setOfertareserva($oferta);
                $reserva->setPrecio($oferta->getPrecio());
                $reserva->setRecinto($oferta->getRecinto());
                $diasreservas = new DiasReservas();
                $diasreservas->setReserva($reserva);
                $diasreservas->setDia($oferta->getFioferta());
                $reserva->addDia($diasreservas);


                $diasreservas = new DiasReservas();
                $diasreservas->setReserva($reserva);
                $diasreservas->setDia($oferta->getFfoferta());
                $reserva->addDia($diasreservas);

                $cadenafecha = $oferta->getFioferta()->format("Y-m-d");
                $cadenafecha2 = $oferta->getFfoferta()->format('Y-m-d');

                if ($cadenafecha != $cadenafecha2) {

                    $fecha2 = new \DateTime($cadenafecha);
                    $fecha2->add(new \DateInterval('P1D'));

                    $cadenafecha = $fecha2->format("Y-m-d");

                    while ($cadenafecha != $cadenafecha2) {

                        $diasreservas = new DiasReservas();
                        $diasreservas->setReserva($reserva);
                        $diasreservas->setDia(new \DateTime($cadenafecha));
                        $reserva->addDia($diasreservas);
                        $fecha2->add(new \DateInterval('P1D'));
                        $cadenafecha = $fecha2->format("Y-m-d");
                    }
 
                }


                $em = $this->getDoctrine()->getManager();
                $em->persist($reserva);
                $em->flush();

                $datospropios["formulario"] = NULL;
                $datospropios["alamacenado"] = TRUE;
            } else {
                $datospropios["formulario"] = $formularioreserva->createView();
                $datospropios["alamacenado"] = FALSE;
            }
        } else {
            $errores = 1;
            $datospropios["formulario"] = NULL;
            $datospropios["alamacenado"] = FALSE;
        }


        $retval = new Response($this->renderView('@App/reservation.html.twig', array('datoscomun' => $this->getComunData($_route, $_locale), 'datospropios' => $datospropios, 'errores' => $errores)));
        return $retval;
    }

    private function getComunData($_route, $_locale) {

        $datoscomun = NULL;

        $datoscomun = array();
        $datoscomun["_locale"] = $_locale;
        $datoscomun["_route"] = $_route;
        return $datoscomun;
    }

}
