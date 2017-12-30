<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Identical;

class EmpresaNewForm extends Form {

    public function initialize() {
        
        $nombreEmpresa = new Text('nombreEmpresa',
                             array('placeholder' => 'Nombre Empresa', 'class' => 'form-control'));
        $nombreEmpresa->addValidator(new PresenceOf(array('message' => 'Se Requiere Nombre de Empresa')));
        $this->add($nombreEmpresa);
        
        $razonSocial = new Text('razonSocial',
                             array('placeholder' => 'Razón Social', 'class' => 'form-control'));
        $razonSocial->addValidator(new PresenceOf(array('message' => 'Se Requiere Razón Social')));
        $this->add($razonSocial);
        
        $limiteUsuarios = new Text('limiteUsuarios',
                             array('placeholder' => 'Límite de Usuarios', 'class' => 'form-control', 'onKeyPress'=>'return soloNumeros(event)', 'maxlength'=>'3'));
        $limiteUsuarios->addValidator(new PresenceOf(array('message' => 'Se Requiere Límite de Usuarios')));
        $this->add($limiteUsuarios);
        
        $identificadorEmpresa = new Text('identificadorEmpresa',
                             array('placeholder' => 'Identificador de Empresa', 'class' => 'form-control'));
        $identificadorEmpresa->addValidator(new PresenceOf(array('message' => 'Se Identificador de Empresa')));
        $this->add($identificadorEmpresa);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array('value' => $this->security->getSessionToken(), 'message' => '¡La validación CSRF ha fallado!')));
        $this->add($csrf);

        $submit = new Submit('save',
                             array('value' => 'Guardar','class' => 'col-sm-5 btn btn-primary'));
        $this->add($submit);
    }
}



