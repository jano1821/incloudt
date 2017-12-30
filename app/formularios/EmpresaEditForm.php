<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Select,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Identical;

class EmpresaEditForm extends Form {

    public function initialize() {
        
        $nombreEmpresa = new Text('nombreEmpresa',
                             array('placeholder' => 'Nombre Empresa', 'class' => 'form-control'));
        $nombreEmpresa->addValidator(new PresenceOf(array('message' => 'Se Requiere Nombre')));
        $this->add($nombreEmpresa);
        
        $razonSocial = new Text('razonSocial',
                             array('placeholder' => 'Razón Social', 'class' => 'form-control'));
        $razonSocial->addValidator(new PresenceOf(array('message' => 'Se Requiere Razón Social')));
        $this->add($razonSocial);
        
        $limiteUsuarios = new Text('limiteUsuarios',
                             array('placeholder' => 'Límite de Usuarios', 'class' => 'form-control'));
        $limiteUsuarios->addValidator(new PresenceOf(array('message' => 'Se Requiere Límite de Usuarios')));
        $this->add($limiteUsuarios);
        
        $identificadorEmpresa = new Text('identificadorEmpresa',
                             array('placeholder' => 'Identificador de Empresa', 'class' => 'form-control'));
        $identificadorEmpresa->addValidator(new PresenceOf(array('message' => 'Se Requiere Identificador')));
        $this->add($identificadorEmpresa);

        $estadoRegistro = new Select('estadoRegistro',
                                 array('S' => 'Vigente', 'N' => 'No vigente'));
        $estadoRegistro->addValidator(new PresenceOf(array('message' => 'Se Requiere Estado')));
        $this->add($estadoRegistro);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array('value' => $this->security->getSessionToken(), 'message' => '¡La validación CSRF ha fallado!')));
        $this->add($csrf);

        $submit = new Submit('save',
                             array('value' => 'Guardar','class' => 'col-sm-5 btn btn-primary'));
        $this->add($submit);
    }
}