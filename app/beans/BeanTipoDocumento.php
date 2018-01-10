<?php

class BeanTipoDocumento {
    public $codTipoDocumento;
    public $descripcionTipoDocumento;
    public $estadoRegistro;
    public $usuarioInsercion;
    public $fechaInsercion;
    public $usuarioModificacion;
    public $fechaModificacion;

    function getCodTipoDocumento() {
        return $this->codTipoDocumento;
    }

    function setCodTipoDocumento($codTipoDocumento) {
        $this->codTipoDocumento = $codTipoDocumento;
    }

    function getDescripcionTipoDocumento() {
        return $this->descripcionTipoDocumento;
    }

    function setDescripcionTipoDocumento($descripcionTipoDocumento) {
        $this->descripcionTipoDocumento = $descripcionTipoDocumento;
    }

    function getEstadoRegistro() {
        return $this->estadoRegistro;
    }

    function setEstadoRegistro($estadoRegistro) {
        $this->estadoRegistro = $estadoRegistro;
    }

    function getUsuarioInsercion() {
        return $this->usuarioInsercion;
    }

    function setUsuarioInsercion($usuarioInsercion) {
        $this->usuarioInsercion = $usuarioInsercion;
    }

    function getFechaInsercion() {
        return $this->fechaInsercion;
    }

    function setFechaInsercion($fechaInsercion) {
        $this->fechaInsercion = $fechaInsercion;
    }

    function getUsuarioModificacion() {
        return $this->usuarioModificacion;
    }

    function setUsuarioModificacion($usuarioModificacion) {
        $this->usuarioModificacion = $usuarioModificacion;
    }

    function getFechaModificacion() {
        return $this->fechaModificacion;
    }

    function setFechaModificacion($fechaModificacion) {
        $this->fechaModificacion = $fechaModificacion;
    }
}