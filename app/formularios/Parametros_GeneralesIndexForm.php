<?php
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Select,
    Phalcon\Validation\Validator\PresenceOf,                        
    Phalcon\Validation\Validator\Identical;

class Parametros_GeneralesIndexForm extends Form {

    public function initialize() {
        
        $identificadorParametro = new Text('identificadorParametro',
                             array('placeholder' => 'Identificador de Parametro', 'class' => 'form-control'));
        $this->add($identificadorParametro);
        
        $descipcionParametro = new Text('descipcionParametro',
                             array('placeholder' => 'Identificador de Parametro', 'class' => 'form-control'));
        $this->add($descipcionParametro);
        
        $valorParametro = new Text('valorParametro',
                             array('placeholder' => 'Identificador de Parametro', 'class' => 'form-control'));
        $this->add($valorParametro);

        $estadoRegistro = new Select('estadoRegistro',
                                 array(''=>'Seleccione Estado...','S' => 'Vigente', 'N' => 'No vigente'));
        $estadoRegistro->addValidator(new PresenceOf(array('message' => 'Se Requiere Estado')));
        $this->add($estadoRegistro);
        
        $indicadorFijo = new Select('indicadorFijo',
                                 array(''=>'Seleccione Indicador...','S' => 'Si', 'N' => 'No'));
        $indicadorFijo->addValidator(new PresenceOf(array('message' => 'Se Requiere Indicador')));
        $this->add($indicadorFijo);

        $csrf = new Hidden('csrf');
        $csrf->addValidator(new Identical(array('value' => $this->security->getSessionToken(), 'message' => '¡La validación CSRF ha fallado!')));
        $this->add($csrf);

        $submit = new Submit('buscar',
                             array('value' => 'Buscar','class' => 'col-sm-5 btn btn-primary'));
        $this->add($submit);
    }
}
