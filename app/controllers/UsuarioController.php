<?php
//use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use UsuarioIndexForm as usuarioIndexForm;

class UsuarioController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        
        //$form = new FormLogin();
        
        $parameters['order'] = "nombreEmpresa ASC";
        $empresa = Empresa::find($parameters);

        $this->view->empresa = $empresa;
        $this->view->form = new usuarioIndexForm();
    }

    /**
     * Searches for usuario
     */
    public function searchAction() {
        $numberPage = 1;
        if (!$this->request->isPost()) {
            $numberPage = $this->request->getQuery("page",
                                                   "int");
        }

        /*$usuario = $this->modelsManager->createBuilder()
                                ->columns("cc.idCodigo," .
                                                        "cc.valorCodigo," .
                                                        "cc.descripcionCodigo," .
                                                        "DATE_FORMAT(cc.fechaRegistro, '%d/%m/%Y') fechaRegistro," .
                                                        "cc.requerimiento requerimiento," .
                                                        "lt.nombrePersona liderTecnico," .
                                                        "lf.nombrePersona liderFuncional," .
                                                        "tc.descripcionTipo," .
                                                        "mo.descripcionModulo")
                                ->addFrom('CatalogoCodigo',
                                          'cc')
                                ->innerJoin('Tipocodigo',
                                            'tc.idTipoCodigo = cc.idTipoCodigo',
                                            'tc')
                                ->innerJoin('Persona',
                                            'lt.idpersona = cc.idLiderTecnico',
                                            'lt')
                                ->innerJoin('Persona',
                                            'lf.idpersona = cc.idLiderFuncional',
                                            'lf')
                                ->innerJoin('Modulo',
                                            'mo.idModulo = cc.idModulo',
                                            'mo')
                                ->andWhere('cc.valorCodigo like :valor: AND ' .
                                                        'cc.descripcionCodigo like :descripcion: AND ' .
                                                        'cc.requerimiento like :requerimiento: AND ' .
                                                        'cc.idLiderTecnico like :tecnico: AND ' .
                                                        'cc.idLiderFuncional like :funcional: AND ' .
                                                        'cc.idTipoCodigo like :tipo: AND ' .
                                                        'cc.idModulo like :modulo: ',
                                           [
                                                'valor' => "%" . $valorcodigo . "%",
                                                'descripcion' => "%" . $descripcioncodigo . "%",
                                                'requerimiento' => "%" . $requerimiento . "%",
                                                'tecnico' => $lidertecnico,
                                                'funcional' => $liderfuncional,
                                                'tipo' => $tipocodigo,
                                                'modulo' => $modulo,
                                                        ]
                                )
                                ->orderBy('cc.valorCodigo')
                                ->getQuery()
                                ->execute();*/
        

        $usuario = Usuario::find();
        if (count($usuario) == 0) {
            $this->flash->notice("La Búsqueda no Encontró Resultados");

            $this->dispatcher->forward([
                            "controller" => "usuario",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $usuario,
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
     * Edits a usuario
     *
     * @param string $codUsuario
     */
    public function editAction($codUsuario) {
        if (!$this->request->isPost()) {

            $usuario = Usuario::findFirstBycodUsuario($codUsuario);
            if (!$usuario) {
                $this->flash->error("usuario was not found");

                $this->dispatcher->forward([
                                'controller' => "usuario",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codUsuario = $usuario->codUsuario;

            $this->tag->setDefault("codUsuario",
                                   $usuario->codUsuario);
            $this->tag->setDefault("codEmpresa",
                                   $usuario->codEmpresa);
            $this->tag->setDefault("nombreUsuario",
                                   $usuario->nombreUsuario);
            $this->tag->setDefault("passwordUsuario",
                                   $usuario->passwordUsuario);
            $this->tag->setDefault("cantidadIntentos",
                                   $usuario->cantidadIntentos);
            $this->tag->setDefault("indicadorUsuarioAdministrador",
                                   $usuario->indicadorUsuarioAdministrador);
            $this->tag->setDefault("estadoRegistro",
                                   $usuario->estadoRegistro);
            $this->tag->setDefault("fechaInsercion",
                                   $usuario->fechaInsercion);
            $this->tag->setDefault("usuarioInsercion",
                                   $usuario->usuarioInsercion);
            $this->tag->setDefault("fechaModificacion",
                                   $usuario->fechaModificacion);
            $this->tag->setDefault("usuarioModificacion",
                                   $usuario->usuarioModificacion);
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction() {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario = new Usuario();
        $usuario->Codusuario = $this->request->getPost("codUsuario");
        $usuario->Codempresa = $this->request->getPost("codEmpresa");
        $usuario->CodPersonaUsuario = $this->request->getPost("codPersonaUsuario");
        $usuario->Nombreusuario = $this->request->getPost("nombreUsuario");
        $usuario->Passwordusuario = $this->request->getPost("passwordUsuario");
        $usuario->Cantidadintentos = $this->request->getPost("cantidadIntentos");
        $usuario->Indicadorusuarioadministrador = $this->request->getPost("indicadorUsuarioAdministrador");
        $usuario->Estadoregistro = $this->request->getPost("estadoRegistro");
        $usuario->Fechainsercion = $this->request->getPost("fechaInsercion");
        $usuario->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $usuario->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $usuario->Usuariomodificacion = $this->request->getPost("usuarioModificacion");


        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("usuario was created successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $codUsuario = $this->request->getPost("codUsuario");
        $usuario = Usuario::findFirstBycodUsuario($codUsuario);

        if (!$usuario) {
            $this->flash->error("usuario does not exist " . $codUsuario);

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $usuario->Codusuario = $this->request->getPost("codUsuario");
        $usuario->Codempresa = $this->request->getPost("codEmpresa");
        $usuario->Nombreusuario = $this->request->getPost("nombreUsuario");
        $usuario->Passwordusuario = $this->request->getPost("passwordUsuario");
        $usuario->Cantidadintentos = $this->request->getPost("cantidadIntentos");
        $usuario->Indicadorusuarioadministrador = $this->request->getPost("indicadorUsuarioAdministrador");
        $usuario->Estadoregistro = $this->request->getPost("estadoRegistro");
        $usuario->Fechainsercion = $this->request->getPost("fechaInsercion");
        $usuario->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $usuario->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $usuario->Usuariomodificacion = $this->request->getPost("usuarioModificacion");


        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'edit',
                            'params' => [$usuario->codUsuario]
            ]);

            return;
        }

        $this->flash->success("usuario was updated successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a usuario
     *
     * @param string $codUsuario
     */
    public function deleteAction($codUsuario) {
        $usuario = Usuario::findFirstBycodUsuario($codUsuario);
        if (!$usuario) {
            $this->flash->error("usuario was not found");

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("usuario was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => "index"
        ]);
    }
}