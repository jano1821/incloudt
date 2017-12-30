<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Select,
    Phalcon\Validation\Validator\Identical;

class UsuarioSistemaIndexForm extends Form {

    public function initialize() {

        $codUsuario = new Text('codUsuario',
                             array('placeholder' => 'Usuario', 'class' => 'form-control', 'disabled'=>'true'));
        $this->add($codUsuario);
        
        $codSistema = new Text('codSistema',
                             array('placeholder' => 'Sistema', 'class' => 'form-control', 'disabled'=>'true'));
        $this->add($codSistema);
        
        $estadoRegistro = new Select('estadoRegistro',
                                 array(''=>'Seleccione Estado...','S' => 'Vigente', 'N' => 'No vigente'));
        $this->add($estadoRegistro);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array('value' => $this->security->getSessionToken(), 'message' => '¡La validación CSRF ha fallado!')));
        $this->add($csrf);

        $submit = new Submit('buscar',
                             array('value' => 'Buscar','class' => 'col-sm-5 btn btn-primary'));
        $this->add($submit);
    }
}