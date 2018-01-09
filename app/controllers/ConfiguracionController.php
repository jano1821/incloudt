<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
//use EmpresaIndexForm as empresaIndexForm;
//use EmpresaNewForm as empresaNewForm;
//use EmpresaEditForm as empresaEditForm;

class ConfiguracionController extends ControllerBase {
    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        //$this->view->form = new empresaIndexForm();
    }
}

