<?php

class BeanCatalogoCodigo {
    private $idCodigo;
    private $valorCodigo;
    private $descripcionCodigo;
    private $fechaRegistro;
    private $requerimiento;
    private $idLiderTecnico;
    private $idLiderFuncional;
    private $idTipoCodigo;
    private $nombreLiderTecnico;
    private $nombreLiderfuncional;
    private $descripcionTipoProducto;

    function getIdCodigo() {
        return $this->idCodigo;
    }

    function getValorCodigo() {
        return $this->valorCodigo;
    }

    function getDescripcionCodigo() {
        return $this->descripcionCodigo;
    }

    function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    function getRequerimiento() {
        return $this->requerimiento;
    }

    function getIdLiderTecnico() {
        return $this->idLiderTecnico;
    }

    function getIdLiderFuncional() {
        return $this->idLiderFuncional;
    }

    function getIdTipoCodigo() {
        return $this->idTipoCodigo;
    }

    function getNombreLiderTecnico() {
        return $this->nombreLiderTecnico;
    }

    function getNombreLiderfuncional() {
        return $this->nombreLiderfuncional;
    }

    function getDescripcionTipoProducto() {
        return $this->descripcionTipoProducto;
    }

    function setIdCodigo($idCodigo) {
        $this->idCodigo = $idCodigo;
    }

    function setValorCodigo($valorCodigo) {
        $this->valorCodigo = $valorCodigo;
    }

    function setDescripcionCodigo($descripcionCodigo) {
        $this->descripcionCodigo = $descripcionCodigo;
    }

    function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }

    function setRequerimiento($requerimiento) {
        $this->requerimiento = $requerimiento;
    }

    function setIdLiderTecnico($idLiderTecnico) {
        $this->idLiderTecnico = $idLiderTecnico;
    }

    function setIdLiderFuncional($idLiderFuncional) {
        $this->idLiderFuncional = $idLiderFuncional;
    }

    function setIdTipoCodigo($idTipoCodigo) {
        $this->idTipoCodigo = $idTipoCodigo;
    }

    function setNombreLiderTecnico($nombreLiderTecnico) {
        $this->nombreLiderTecnico = $nombreLiderTecnico;
    }

    function setNombreLiderfuncional($nombreLiderfuncional) {
        $this->nombreLiderfuncional = $nombreLiderfuncional;
    }

    function setDescripcionTipoProducto($descripcionTipoProducto) {
        $this->descripcionTipoProducto = $descripcionTipoProducto;
    }
}