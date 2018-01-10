<?php

class BeanTipoDocumento {
    public $codTipoDocumento;
    public $descripcionTipoDocumento;
    public $estadoRegistro;

    function getCodTipoDocumento() {
        return $this->codTipoDocumento;
    }

    function getDescripcionTipoDocumento() {
        return $this->descripcionTipoDocumento;
    }

    function getEstadoRegistro() {
        return $this->estadoRegistro;
    }

    function setCodTipoDocumento($codTipoDocumento) {
        $this->codTipoDocumento = $codTipoDocumento;
    }

    function setDescripcionTipoDocumento($descripcionTipoDocumento) {
        $this->descripcionTipoDocumento = $descripcionTipoDocumento;
    }

    function setEstadoRegistro($estadoRegistro) {
        $this->estadoRegistro = $estadoRegistro;
    }
}