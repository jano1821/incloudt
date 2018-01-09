<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
use WS_Tipo_DocumentoIndexForm as ws_Tipo_DocumentoIndexForm;
//use EmpresaNewForm as empresaNewForm;
//use EmpresaEditForm as empresaEditForm;

class WSTipoDocumentoController extends ControllerBase {
    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        $this->view->form = new ws_Tipo_DocumentoIndexForm();
    }
}
