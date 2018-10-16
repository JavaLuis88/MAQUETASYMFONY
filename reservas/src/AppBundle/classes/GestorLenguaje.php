<?php

namespace AppBundle\classes;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
//use Doctrine\Bundle\DoctrineBundle\Registry;
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
class GestorLenguaje {

    //put your code here

    public function __construct() {
    }

    public function getAppLanguages() {

        $retval = NULL;

        $retval = array();

        $retval[0] = "es";
        $retval[1] = "en";

        return $retval;
    }

    public function getLanguageFile($languagename) {
        $ruta = "";
        $linea = "";
        $partes = array();
        $retval = array();
        $fp = NULL;

        $ruta = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "Resources" . DIRECTORY_SEPARATOR . "translations" . DIRECTORY_SEPARATOR . "messages." . $languagename . ".yml";
        $fp = fopen($ruta, "r");
        if ($fp) {
            while (feof($fp) == FALSE) {
                $linea = fgets($fp);

                if ($linea !== FALSE && trim($linea) != "" && substr(trim($linea), 0, 1) != "#") {
                    $partes = explode(":", $linea);
                    if (count($partes) == 2 && trim($partes[0]) != "" && trim($partes[1]) != "") {

                        $retval[addslashes(trim($partes[0]))] = addslashes(trim($partes[1]));
                    }
                }
            }


            fclose($fp);
        }

     

        return $retval;
    }

}
