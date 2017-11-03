<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Select,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Identical;

class PersonaUsuarioEditForm extends Form {

    public function initialize() {
        
        $nombresPersona = new Text('nombresPersona',
                             array('placeholder' => 'Nombres Persona', 'class' => 'form-control'));
        $nombresPersona->addValidator(new PresenceOf(array('message' => 'Se Requiere Nombres')));
        $this->add($nombresPersona);
        
        $apellidosPersona = new Text('apellidosPersona',
                             array('placeholder' => 'Apellidos Persona', 'class' => 'form-control'));
        $apellidosPersona->addValidator(new PresenceOf(array('message' => 'Se Requiere Apellidos')));
        $this->add($apellidosPersona);

        $numeroDocumento = new Text('numeroDocumento',
                                 array('placeholder' => 'Nro Documento', 'class' => 'form-control'));
        $numeroDocumento->addValidator(new PresenceOf(array('message' => 'Se Requiere Numero de Documento')));
        $this->add($numeroDocumento);
        
        $numeroCelular = new Text('numeroCelular',
                                 array('placeholder' => 'Nro Celular', 'class' => 'form-control'));
        $this->add($numeroCelular);
        
        $numeroAnexo = new Text('numeroAnexo',
                                 array('placeholder' => 'Nro Anexo', 'class' => 'form-control'));
        $this->add($numeroAnexo);
        
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



