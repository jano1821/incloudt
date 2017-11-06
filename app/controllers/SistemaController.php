<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class SistemaController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for sistema
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di,
                                         'Sistema',
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
        $parameters["order"] = "codSistema";

        $sistema = Sistema::find($parameters);
        if (count($sistema) == 0) {
            $this->flash->notice("The search did not find any sistema");

            $this->dispatcher->forward([
                            "controller" => "sistema",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $sistema,
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
     * Edits a sistema
     *
     * @param string $codSistema
     */
    public function editAction($codSistema) {
        if (!$this->request->isPost()) {

            $sistema = Sistema::findFirstBycodSistema($codSistema);
            if (!$sistema) {
                $this->flash->error("sistema was not found");

                $this->dispatcher->forward([
                                'controller' => "sistema",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codSistema = $sistema->codSistema;

            $this->tag->setDefault("codSistema",
                                   $sistema->codSistema);
            $this->tag->setDefault("etiquetaSistema",
                                   $sistema->etiquetaSistema);
            $this->tag->setDefault("urlSistema",
                                   $sistema->urlSistema);
            $this->tag->setDefault("urlIcono",
                                   $sistema->urlIcono);
            $this->tag->setDefault("estadoRegistro",
                                   $sistema->estadoRegistro);
            $this->tag->setDefault("fechaInsercion",
                                   $sistema->fechaInsercion);
            $this->tag->setDefault("usuarioInsercion",
                                   $sistema->usuarioInsercion);
            $this->tag->setDefault("fechaModificacion",
                                   $sistema->fechaModificacion);
            $this->tag->setDefault("usuarioModificacion",
                                   $sistema->usuarioModificacion);
        }
    }

    /**
     * Creates a new sistema
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $sistema = new Sistema();
        $sistema->Etiquetasistema = $this->request->getPost("etiquetaSistema");
        $sistema->Urlsistema = $this->request->getPost("urlSistema");
        $sistema->Urlicono = $this->request->getPost("urlIcono");
        $sistema->Estadoregistro = $this->request->getPost("estadoRegistro");
        $sistema->Fechainsercion = $this->request->getPost("fechaInsercion");
        $sistema->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $sistema->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $sistema->Usuariomodificacion = $this->request->getPost("usuarioModificacion");


        if (!$sistema->save()) {
            foreach ($sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("sistema was created successfully");

        $this->dispatcher->forward([
                        'controller' => "sistema",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a sistema edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $codSistema = $this->request->getPost("codSistema");
        $sistema = Sistema::findFirstBycodSistema($codSistema);

        if (!$sistema) {
            $this->flash->error("sistema does not exist " . $codSistema);

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $sistema->Etiquetasistema = $this->request->getPost("etiquetaSistema");
        $sistema->Urlsistema = $this->request->getPost("urlSistema");
        $sistema->Urlicono = $this->request->getPost("urlIcono");
        $sistema->Estadoregistro = $this->request->getPost("estadoRegistro");
        $sistema->Fechainsercion = $this->request->getPost("fechaInsercion");
        $sistema->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $sistema->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $sistema->Usuariomodificacion = $this->request->getPost("usuarioModificacion");


        if (!$sistema->save()) {

            foreach ($sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'edit',
                            'params' => [$sistema->codSistema]
            ]);

            return;
        }

        $this->flash->success("sistema was updated successfully");

        $this->dispatcher->forward([
                        'controller' => "sistema",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a sistema
     *
     * @param string $codSistema
     */
    public function deleteAction($codSistema) {
        $sistema = Sistema::findFirstBycodSistema($codSistema);
        if (!$sistema) {
            $this->flash->error("sistema was not found");

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$sistema->delete()) {

            foreach ($sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("sistema was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "sistema",
                        'action' => "index"
        ]);
    }
}