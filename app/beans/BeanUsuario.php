<?php

class BeanUsuario {
    public $idUsuario;
    public $userName;
    public $password;
    public $estadoRegistro;

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassword() {
        return $this->password;
    }

    function getEstadoRegistro() {
        return $this->estadoRegistro;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEstadoRegistro($estadoRegistro) {
        $this->estadoRegistro = $estadoRegistro;
    }
}