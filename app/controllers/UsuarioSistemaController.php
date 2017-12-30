<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsuarioSistemaController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();

        $this->view->form = new UsuarioSistemaIndexForm();
    }

    /**
     * Searches for usuario_sistema
     */
    public function searchAction() {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di,
                                         'UsuarioSistema',
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
        $parameters["order"] = "codUsuario";

        $usuario_sistema = UsuarioSistema::find($parameters);
        if (count($usuario_sistema) == 0) {
            $this->flash->notice("The search did not find any usuario_sistema");

            $this->dispatcher->forward([
                            "controller" => "usuario_sistema",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $usuario_sistema,
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
     * Edits a usuario_sistema
     *
     * @param string $codUsuario
     */
    public function editAction($codUsuario) {
        if (!$this->request->isPost()) {

            $usuario_sistema = UsuarioSistema::findFirstBycodUsuario($codUsuario);
            if (!$usuario_sistema) {
                $this->flash->error("usuario_sistema was not found");

                $this->dispatcher->forward([
                                'controller' => "usuario_sistema",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codUsuario = $usuario_sistema->codUsuario;

            $this->tag->setDefault("codUsuario",
                                   $usuario_sistema->codUsuario);
            $this->tag->setDefault("codSistema",
                                   $usuario_sistema->codSistema);
            $this->tag->setDefault("estadoRegistro",
                                   $usuario_sistema->estadoRegistro);
        }
    }

    /**
     * Creates a new usuario_sistema
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario_sistema = new UsuarioSistema();
        $usuario_sistema->Codusuario = $this->request->getPost("codUsuario");
        $usuario_sistema->Codsistema = $this->request->getPost("codSistema");
        $usuario_sistema->Estadoregistro = $this->request->getPost("estadoRegistro");


        if (!$usuario_sistema->save()) {
            foreach ($usuario_sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("usuario_sistema was created successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario_sistema",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a usuario_sistema edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $codUsuario = $this->request->getPost("codUsuario");
        $usuario_sistema = UsuarioSistema::findFirstBycodUsuario($codUsuario);

        if (!$usuario_sistema) {
            $this->flash->error("usuario_sistema does not exist " . $codUsuario);

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario_sistema->Codusuario = $this->request->getPost("codUsuario");
        $usuario_sistema->Codsistema = $this->request->getPost("codSistema");
        $usuario_sistema->Estadoregistro = $this->request->getPost("estadoRegistro");


        if (!$usuario_sistema->save()) {

            foreach ($usuario_sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'edit',
                            'params' => [$usuario_sistema->codUsuario]
            ]);

            return;
        }

        $this->flash->success("usuario_sistema was updated successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario_sistema",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a usuario_sistema
     *
     * @param string $codUsuario
     */
    public function deleteAction($codUsuario) {
        $usuario_sistema = UsuarioSistema::findFirstBycodUsuario($codUsuario);
        if (!$usuario_sistema) {
            $this->flash->error("usuario_sistema was not found");

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$usuario_sistema->delete()) {

            foreach ($usuario_sistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("usuario_sistema was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario_sistema",
                        'action' => "index"
        ]);
    }
    
    public function ajaxPostAction(){
        $this->view->disable();
        $tabla = '';
        $contador = 0;

        if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
                $labelBusquedaUsuario = $this->request->getPost("busquedaUsuario");
                //$pagina = $this->request->getPost("pagina");
                //$avance = $this->request->getPost("avance");

                /*if ($pagina == "") {
                    $pagina = 1;
                }
                if ($avance == "" || $avance == "0") {
                    $pagina = 1;
                }*/

                $usuarios = $this->modelsManager->createBuilder()
                                        ->columns("em.nombreEmpresa," .
                                                  "us.nombreUsuario," .
                                                  "us.codUsuario")
                                        ->addFrom('Usuario',
                                                  'us')
                                        ->innerJoin('Empresa',
                                                    'us.codEmpresa = em.codEmpresa',
                                                    'em')
                                        ->andWhere('us.nombreUsuario like :nombreUsuario: ' ,
                                                    [
                                                        'nombreUsuario' => "%" . $labelBusquedaUsuario . "%",
                                                    ]
                                        )
                                        ->orderBy('us.nombreUsuario')
                                        ->getQuery()
                                        ->execute();

                foreach ($usuarios as $usuario){
                    $contador++;
                    $tabla = $tabla."<tr><td>".$contador;
                    $tabla = $tabla."</td><td>";
                    $tabla = $tabla.$usuario->nombreUsuario;
                    $tabla = $tabla."</td><td>";
                    $tabla = $tabla.$usuario->nombreEmpresa;
                    $tabla = $tabla."</td><td class='text-center'><a class='btn btn-info'href='#'><i class='glyphicon glyphicon-plus'></i></a></td></tr>";
                }
                
                $this->response->setJsonContent(array('res' => array("codigo" => $tabla)));
                $this->response->setStatusCode(200,
                                               "OK");
                $this->response->send();
            }else {
                $this->response->setStatusCode(406,
                                               "Not Acceptable");
            }
        }else {
            $this->response->setStatusCode(404,
                                           "Not Found");
        }
    }
}