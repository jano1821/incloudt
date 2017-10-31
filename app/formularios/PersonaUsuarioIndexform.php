<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Validation\Validator\Identical;

class PersonaUsuarioIndexForm extends Form {

    public function initialize() {
        
        $nombresPersona = new Text('nombresPersona',
                             array('placeholder' => 'Nombres Persona', 'class' => 'form-control'));
        $this->add($nombresPersona);
        
        $apellidosPersona = new Text('apellidosPersona',
                             array('placeholder' => 'Apellidos Persona', 'class' => 'form-control'));
        $this->add($apellidosPersona);

        $numeroDocumento = new Text('numeroDocumento',
                                 array('placeholder' => 'Nro Documento', 'class' => 'form-control'));
        $this->add($numeroDocumento);
        
        $numeroCelular = new Text('numeroCelular',
                                 array('placeholder' => 'Nro Celular', 'class' => 'form-control'));
        $this->add($numeroCelular);
        
        $numeroAnexo = new Text('numeroAnexo',
                                 array('placeholder' => 'Nro Anexo', 'class' => 'form-control'));
        $this->add($numeroAnexo);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array('value' => $this->security->getSessionToken(), 'message' => '¡La validación CSRF ha fallado!')));
        $this->add($csrf);

        $submit = new Submit('buscar',
                             array('value' => 'Buscar','class' => 'col-sm-10 btn btn-primary'));
        $this->add($submit);
    }
}