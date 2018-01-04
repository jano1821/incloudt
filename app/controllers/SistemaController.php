<?php

use Phalcon\Paginator\Adapter\Model as Paginator;
use SistemaIndexForm as sistemaIndexForm;
use SistemaNewForm as sistemaNewForm;
use SistemaEditForm as sistemaEditForm;

class SistemaController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        $this->view->form = new sistemaIndexForm();
    }

    /**
     * Searches for sistema
     */
    public function searchAction() {
        parent::validarSession();
        
        $etiquetaSistema = $this->request->getPost("etiquetaSistema");
        $urlSistema = $this->request->getPost("urlSistema");
        $urlIcono = $this->request->getPost("urlIcono");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        $sistema = $this->modelsManager->createBuilder()
                                ->columns("si.codSistema," .
                                          "si.etiquetaSistema," .
                                          "si.urlSistema," .
                                          "si.urlIcono," .
                                          "if(si.estadoRegistro='S','Vigente','No Vigente') as estado")
                                ->addFrom('Sistema',
                                          'si')
                                ->andWhere('si.etiquetaSistema like :etiquetaSistema: AND ' .
                                                        'si.urlSistema like :urlSistema: AND ' .
                                                        'si.urlIcono like :urlIcono: AND ' .
                                                        'si.estadoRegistro like :estado: ',
                                           [
                                                'etiquetaSistema' => "%" . $etiquetaSistema . "%",
                                                'urlSistema' => "%" . $urlSistema . "%",
                                                'urlIcono' => "%" . $urlIcono . "%",
                                                'estado' => "%" . $estado . "%",
                                                        ]
                                )
                                ->orderBy('si.etiquetaSistema')
                                ->getQuery()
                                ->execute();
        
        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($sistema) / 10) + 1) {
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
            $pagina = floor(count($sistema) / 10) + 1;
        }

        if (count($sistema) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "sistema",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $sistema,
                        'limit' => 10,
                        'page' => $pagina
        ]);

        $this->tag->setDefault("pagina",
                               $pagina);
        $this->view->page = $paginator->getPaginate();
        
    }

    /**
     * Displays the creation form
     */
    public function newAction() {
        parent::validarSession();
        
        $this->view->form = new sistemaNewForm();
    }

    /**
     * Edits a sistema
     *
     * @param string $codSistema
     */
    public function editAction($codSistema) {
        parent::validarSession();
        
        if (!$this->request->isPost()) {

            $sistema = Sistema::findFirstBycodSistema($codSistema);
            if (!$sistema) {
                $this->flash->error("Sistema no Encontrado");

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
            
            $this->view->form = new sistemaEditForm();
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
            $this->flash->error("Sistema no Encontrado " . $codSistema);

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $form = new sistemaEditForm();
        if (!$this->request->isPost() || $form->isValid($this->request->getPost()) == false) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'Edit'
            ]);

            return;
        }else {
            if ($this->session->has("Usuario")) {
                $usuario = $this->session->get("Usuario");
                $username = $usuario['nombreUsuario'];
            }else {
                $this->session->destroy();
                $this->response->redirect('index');
            }

            $sistema->Etiquetasistema = $this->request->getPost("etiquetaSistema");
            $sistema->Urlsistema = $this->request->getPost("urlSistema");
            $sistema->Urlicono = $this->request->getPost("urlIcono");
            $sistema->Estadoregistro = $this->request->getPost("estadoRegistro");
            $sistema->Fechamodificacion = strftime("%Y-%m-%d",
                                                   time());
            $sistema->Usuariomodificacion = $username;


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

            $this->flash->success("Sistema Actualizado Satisfactoriamente");

            $this->dispatcher->forward([
                            'controller' => "sistema",
                            'action' => 'index'
            ]);
        }
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
    
    public function resetAction() {
        parent::validarSession();

        $form = new personaUsuarioIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "sistema",
                        'action' => 'index'
        ]);

        return;
    }
}