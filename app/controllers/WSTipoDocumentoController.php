<?php

use BeanTipoDocumento as beanTipoDocumento;
use WS_Tipo_DocumentoIndexForm as ws_Tipo_DocumentoIndexForm;
use WS_Tipo_DocumentoEditForm as ws_Tipo_DocumentoEditForm;

class WSTipoDocumentoController extends ControllerBase {
    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        $this->view->form = new ws_Tipo_DocumentoIndexForm();
    }
    
    public function searchAction() {
        parent::validarSession();
        
        $nombreEmpresas = $this->request->getPost("descripcion");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }
        $proxy = $this->webService_ListarTipoDocumento();
        $tipoDocumento = $proxy->obtenerTipoDocumento($nombreEmpresas,$estado,10,(($pagina-1)*10));

        $listBeanTipoDocumento = array();
        $cantReg = count(explode( '#', $tipoDocumento['codTipoDocumento']));
        $listCodTipodocumento = explode( '#', $tipoDocumento['codTipoDocumento']);
        $listDescripcionTipoDocumento = explode( '#', $tipoDocumento['descripcionTipoDocumento']);
        $listEstadoRegistro = explode( '#', $tipoDocumento['estadoRegistro']);

        for ($i=0;$i<$cantReg-1;$i++){
            $BeanTipoDocumento = new beanTipoDocumento();
            $BeanTipoDocumento->setCodTipoDocumento($listCodTipodocumento[$i]);
            $BeanTipoDocumento->setDescripcionTipoDocumento($listDescripcionTipoDocumento[$i]);
            $BeanTipoDocumento->setEstadoRegistro($listEstadoRegistro[$i]);
            array_push($listBeanTipoDocumento, $BeanTipoDocumento);
        }
        
        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($tipoDocumento) / 10) + 1) {
                $pagina = $pagina + 1;
            }else {
                $this->flash->notice("No hay Registros Posteriores");
            }
        }else if ($avance == -1) {
            if ($pagina > 1) {
                $pagina = $pagina - 1;
            }else {
                $this->flash->notice("No hay Registros Anteriores");
            }
        }else if ($avance == 2) {
            $pagina = floor(count($tipoDocumento) / 10) + 1;
        }

        if (count($tipoDocumento) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "ws_tipo_documento",
                            "action" => "index"
            ]);

            return;
        }

        $this->view->listTipoDoc = $listBeanTipoDocumento;
        $this->tag->setDefault("pagina",
                               $pagina);
        $this->view->cantReg = $cantReg-1;
        $this->view->pag = $pagina;
    }
    
    
    
    
    
    public function editAction($codTipoDocumento) {
        parent::validarSession();

        if (!$this->request->isPost()) {

            $proxy = $this->webService_ObtenerTipoDocumento();
            $tipoDocumento = $proxy->obtenerTipoDocumento($codTipoDocumento);
            if (count($tipoDocumento)<=0) {
                $this->flash->error("Tipo de documento no Encontrado");

                $this->dispatcher->forward([
                                'controller' => "ws_tipo_documento",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codTipoDocumento = $tipoDocumento['codTipoDocumento'];

            $this->tag->setDefault("codEmpresa",
                                   $tipoDocumento['codTipoDocumento']);
            $this->tag->setDefault("descripcion",
                                   $tipoDocumento['descripcionTipoDocumento']);
            $this->tag->setDefault("estadoRegistro",
                                   $tipoDocumento['estadoRegistro']);
            
            $this->view->form = new ws_Tipo_DocumentoEditForm();
        }
    }
    
    public function webService_ListarTipoDocumento(){
        include_once('files/nusoap.php');
        
        $l_oClient = new soapclient('http://localhost:81/incloudt_clipro/WS_ListarTipoDocumento.php?wsdl', 'wsdl');
        $l_oProxy  = $l_oClient->getProxy();

        return $l_oProxy;
    }
    
    public function webService_ObtenerTipoDocumento(){
        include_once('files/nusoap.php');
        
        $l_oClient = new soapclient('http://localhost:81/incloudt_clipro/WS_ObtenerTipoDocumento.php?wsdl', 'wsdl');
        $l_oProxy  = $l_oClient->getProxy();

        return $l_oProxy;
    }
}