<?php
//use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use UsuarioIndexForm as usuarioIndexForm;
use UsuarioNewForm as usuarioNewForm;

class UsuarioController extends ControllerBase {

    /**
     * Index action
     */
    public function indexAction() {
        parent::validarSession();
        
        $parameters['order'] = "nombreEmpresa ASC";
        $empresa = Empresa::find($parameters);

        $this->view->empresa = $empresa;
        $this->view->form = new usuarioIndexForm();
    }

    /**
     * Searches for usuario
     */
    public function searchAction() {
        parent::validarSession();
        
        $codEmpresa = $this->request->getPost("codEmpresa");
        $nombreUsuario = $this->request->getPost("nombreUsuario");
        $cantidadIntentos = $this->request->getPost("cantidadIntentos");
        $indicadorAdministrador = $this->request->getPost("indicadorUsuarioAdministrador");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        if ($this->request->getPost('reset')){
            echo "hola";
        }

        $usuario = $this->modelsManager->createBuilder()
                                ->columns("em.nombreEmpresa," .
                                          "us.nombreUsuario," .
                                          "us.codUsuario," .
                                          "us.codEmpresa," .
                                          "us.cantidadIntentos," .
                                          "if(us.indicadorUsuarioAdministrador='S','Administrador','No Administrador') as indicadorUsuarioAdministrador," .
                                          "if(us.estadoRegistro='S','Vigente','No Vigente') as estado")
                                ->addFrom('Usuario',
                                          'us')
                                ->innerJoin('Empresa',
                                            'us.codEmpresa = em.codEmpresa',
                                            'em')
                                ->andWhere('us.codEmpresa like :codEmpresa: AND ' .
                                                        'us.nombreUsuario like :nombreUsuario: AND ' .
                                                        'us.cantidadIntentos like :cantidadIntentos: AND ' .
                                                        'us.indicadorUsuarioAdministrador like :indicadorUsuarioAdministrador: AND ' .
                                                        'us.estadoRegistro like :estado: ',
                                           [
                                                'codEmpresa' => "%" . $codEmpresa . "%",
                                                'nombreUsuario' => "%" . $nombreUsuario . "%",
                                                'cantidadIntentos' => "%" . $cantidadIntentos . "%",
                                                'indicadorUsuarioAdministrador' => "%" . $indicadorAdministrador . "%",
                                                'estado' => "%" . $estado . "%",
                                                        ]
                                )
                                ->orderBy('us.nombreUsuario')
                                ->getQuery()
                                ->execute();
        

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($usuario) / 10) + 1) {
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
            $pagina = floor(count($usuario) / 10) + 1;
        }

        if (count($usuario) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "usuario",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $usuario,
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
        
        $parameters['order'] = "nombreEmpresa ASC";
        $empresa = Empresa::find($parameters);

        $personaUsuario = $this->modelsManager->createBuilder()
                                ->columns("pu.codPersonaUsuario," .
                                                        "concat(pu.apellidosPersona,' ',pu.nombresPersona) as nombres")
                                ->addFrom('PersonaUsuario',
                                          'pu')
                                ->andWhere("pu.estadoRegistro = 'S' ")
                                ->orderBy('pu.apellidosPersona')
                                ->getQuery()
                                ->execute();
        
        //$personaUsuario = PersonaUsuario::find($parameters);
        
        $this->view->personaUsuario = $personaUsuario;
        $this->view->empresa = $empresa;
        $this->view->form = new usuarioNewForm();
    }

    /**
     * Edits a usuario
     *
     * @param string $codUsuario
     */
    public function editAction($codUsuario) {
        parent::validarSession();

        if (!$this->request->isPost()) {

            $parameters['order'] = "nombreEmpresa ASC";
            $empresa = Empresa::find($parameters);
            
            $usuario = Usuario::findFirstBycodUsuario($codUsuario);
            if (!$usuario) {
                $this->flash->error("Usuario no Encontrado");

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
                                   "*****************************");
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
            
            $this->view->empresa = $empresa;
            $this->view->form = new usuarioEditForm();
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction() {
        parent::validarSession();
        
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
        parent::validarSession();
        
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
        parent::validarSession();
        
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
    
    public function resetAction() {
        parent::validarSession();

        $form = new personaUsuarioIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "usuario",
                        'action' => 'index'
        ]);

        return;
    }
}