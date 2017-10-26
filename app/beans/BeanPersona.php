<?php

class BeanPersona {
    private $idpersona;
    private $nombrePersona;
    private $idCargo;
    private $descripcionCargo;

    function getIdpersona() {
        return $this->idpersona;
    }

    function getNombrePersona() {
        return $this->nombrePersona;
    }

    function getIdCargo() {
        return $this->idCargo;
    }

    function getDescripcionCargo() {
        return $this->descripcionCargo;
    }

    function setIdpersona($idpersona) {
        $this->idpersona = $idpersona;
    }

    function setNombrePersona($nombrePersona) {
        $this->nombrePersona = $nombrePersona;
    }

    function setIdCargo($idCargo) {
        $this->idCargo = $idCargo;
    }

    function setDescripcionCargo($descripcionCargo) {
        $this->descripcionCargo = $descripcionCargo;
    }
}