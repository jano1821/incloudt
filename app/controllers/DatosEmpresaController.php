<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class DatosEmpresaController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for datos_empresa
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di,
                                         'DatosEmpresa',
                                         $_POST);
            $this->persistent->parameters = $query->getParams();
        }else {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "codEmpresa";

        $datos_empresa = DatosEmpresa::find($parameters);
        if (count($datos_empresa) == 0) {
            $this->flash->notice("The search did not find any datos_empresa");

            $this->dispatcher->forward([
                            "controller" => "datos_empresa",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $datos_empresa,
                        'limit' => 10,
                        'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        
    }

    /**
     * Edits a datos_empresa
     *
     * @param string $codEmpresa
     */
    public function editAction($codEmpresa) {
        if (!$this->request->isPost()) {

            $datos_empresa = DatosEmpresa::findFirstBycodEmpresa($codEmpresa);
            if (!$datos_empresa) {
                $this->flash->error("datos_empresa was not found");

                $this->dispatcher->forward([
                                'controller' => "datos_empresa",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codEmpresa = $datos_empresa->codEmpresa;

            $this->tag->setDefault("codEmpresa",
                                   $datos_empresa->codEmpresa);
            $this->tag->setDefault("razonSocial",
                                   $datos_empresa->razonSocial);
            $this->tag->setDefault("limiteUsuarios",
                                   $datos_empresa->limiteUsuarios);
        }
    }

    /**
     * Creates a new datos_empresa
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'index'
            ]);

            return;
        }

        $datos_empresa = new DatosEmpresa();
        $datos_empresa->Codempresa = $this->request->getPost("codEmpresa");
        $datos_empresa->Razonsocial = $this->request->getPost("razonSocial");
        $datos_empresa->Limiteusuarios = $this->request->getPost("limiteUsuarios");


        if (!$datos_empresa->save()) {
            foreach ($datos_empresa->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("datos_empresa was created successfully");

        $this->dispatcher->forward([
                        'controller' => "datos_empresa",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a datos_empresa edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'index'
            ]);

            return;
        }

        $codEmpresa = $this->request->getPost("codEmpresa");
        $datos_empresa = DatosEmpresa::findFirstBycodEmpresa($codEmpresa);

        if (!$datos_empresa) {
            $this->flash->error("datos_empresa does not exist " . $codEmpresa);

            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'index'
            ]);

            return;
        }

        $datos_empresa->Codempresa = $this->request->getPost("codEmpresa");
        $datos_empresa->Razonsocial = $this->request->getPost("razonSocial");
        $datos_empresa->Limiteusuarios = $this->request->getPost("limiteUsuarios");


        if (!$datos_empresa->save()) {

            foreach ($datos_empresa->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'edit',
                            'params' => [$datos_empresa->codEmpresa]
            ]);

            return;
        }

        $this->flash->success("datos_empresa was updated successfully");

        $this->dispatcher->forward([
                        'controller' => "datos_empresa",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a datos_empresa
     *
     * @param string $codEmpresa
     */
    public function deleteAction($codEmpresa) {
        $datos_empresa = DatosEmpresa::findFirstBycodEmpresa($codEmpresa);
        if (!$datos_empresa) {
            $this->flash->error("datos_empresa was not found");

            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$datos_empresa->delete()) {

            foreach ($datos_empresa->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "datos_empresa",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("datos_empresa was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "datos_empresa",
                        'action' => "index"
        ]);
    }
}