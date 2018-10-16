<?php

namespace AppBundle\beans;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Oferta
 *
 * @author Fu-Manchu
 */
class Oferta {

    //put your code here

    public $id;
    public $precio;
    public $descripcion;
    public $fipublicacion;
    public $ffpublicacion;
    public $fioferta;
    public $ffoferta;
    public $nombrerecinto;
    public $fotorecinto;

    public function __construct() {


        $this->id = 0;
        $this->precio = 0;
        $this->descripcion = "";
        $this->fipublicacion = new \DateTime();
        $this->ffpublicacion = new \DateTime();
        $this->fioferta = new \DateTime();
        $this->ffoferta = new \DateTime();
        $this->nombrerecinto = "";
        $this->fotorecinto = "";
    }

    public function setId($id) {

        $this->id = $id;
    }

    public function getId() {

        return $this->id;
    }

    public function setPrecio($precio) {

        $this->precio = $precio;
    }

    public function getPrecio() {

        return $this->precio;
    }

    public function setDescripcion($descripcion) {

        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {

        return $this->descripcion;
    }

    public function setFipublicacion($fipublicacion) {

        $this->fipublicacion = $fipublicacion;
    }

    public function getFipublicacion() {

        return $this->fipublicacion;
    }

    public function setFfpublicacion($ffpublicacion) {

        $this->ffpublicacion = $ffpublicacion;
    }

    public function getFfpublicacion() {

        return $this->ffpublicacion;
    }

    public function setFioferta($fioferta) {

        $this->fioferta = $fioferta;
    }

    public function getFioferta() {

        return $this->fioferta;
    }

    public function setFfoferta($ffoferta) {

        $this->ffoferta = $ffoferta;
    }

    public function getFfoferta() {

        return $this->ffoferta;
    }

    public function setNombrerecinto($nombrerecinto) {

        $this->nombrerecinto = $nombrerecinto;
    }

    public function getNombrerecinto() {

        return $this->nombrerecinto;
    }

    public function setFotorecinto($fotorecinto) {

        $this->fotorecinto = $fotorecinto;
    }

    public function getFotorecinto() {

        return $this->fotorecinto;
    }

}

?>