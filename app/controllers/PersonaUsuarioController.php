<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use PersonaUsuarioNewForm as personaUsuarioNewForm;
use PersonaUsuarioEditForm as personaUsuarioEditForm;
use PersonaUsuarioIndexForm as personaUsuarioIndexForm;
class PersonaUsuarioController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();

        $this->view->form = new personaUsuarioIndexForm();
    }

    public function searchAction() {
        parent::validarSession();
        $nombres = $this->request->getPost("nombresPersona");
        $apellidos = $this->request->getPost("apellidosPersona");
        $documento = $this->request->getPost("numeroDocumento");
        $celular = $this->request->getPost("numeroCelular");
        $anexo = $this->request->getPost("numeroAnexo");
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
        
        $persona_usuario = $this->modelsManager->createBuilder()
                                ->columns("pu.codPersonaUsuario," .
                                                        "pu.nombresPersona," .
                                                        "pu.apellidosPersona," .
                                                        "pu.numeroDocumento," .
                                                        "pu.numeroCelular," .
                                                        "pu.numeroAnexo," .
                                                        "pu.estadoRegistro")
                                ->addFrom('PersonaUsuario',
                                          'pu')
                                ->andWhere('pu.nombresPersona like :nombres: AND ' .
                                                        'pu.apellidosPersona like :apellidos: AND ' .
                                                        'pu.numeroDocumento like :documento: AND ' .
                                                        'pu.numeroCelular like :celular: AND ' .
                                                        'pu.numeroAnexo like :anexo: AND ' .
                                                        'pu.estadoRegistro like :estado: ',
                                           [
                                                'nombres' => "%" . $nombres . "%",
                                                'apellidos' => "%" . $apellidos . "%",
                                                'documento' => "%" . $documento . "%",
                                                'celular' => "%" . $celular . "%",
                                                'anexo' => "%" . $anexo . "%",
                                                'estado' => "%" . $estado . "%",
                                                        ]
                                )
                                ->orderBy('pu.apellidosPersona')
                                ->getQuery()
                                ->execute();

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($persona_usuario) / 10) + 1) {
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
            $pagina = floor(count($persona_usuario) / 10) + 1;
        }

        if (count($persona_usuario) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "persona_usuario",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $persona_usuario,
                        'limit' => 10,
                        'page' => $pagina
        ]);

        $this->tag->setDefault("pagina",
                               $pagina);
        $this->view->page = $paginator->getPaginate();
    }

    public function newAction() {
        parent::validarSession();

        $this->view->form = new personaUsuarioNewForm();
    }

    public function editAction($codPersonaUsuario) {
        parent::validarSession();

        if (!$this->request->isPost()) {

            $persona_usuario = PersonaUsuario::findFirstBycodPersonaUsuario($codPersonaUsuario);
            if (!$persona_usuario) {
                $this->flash->error("Persona Usuaria No encontrada");

                $this->dispatcher->forward([
                                'controller' => "persona_usuario",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codPersonaUsuario = $persona_usuario->codPersonaUsuario;

            $this->tag->setDefault("codPersonaUsuario",
                                   $persona_usuario->codPersonaUsuario);
            $this->tag->setDefault("nombresPersona",
                                   $persona_usuario->nombresPersona);
            $this->tag->setDefault("apellidosPersona",
                                   $persona_usuario->ApellidosPersona);
            $this->tag->setDefault("numeroDocumento",
                                   $persona_usuario->numeroDocumento);
            $this->tag->setDefault("numeroCelular",
                                   $persona_usuario->numeroCelular);
            $this->tag->setDefault("numeroAnexo",
                                   $persona_usuario->numeroAnexo);
            $this->tag->setDefault("estadoRegistro",
                                   $persona_usuario->estadoRegistro);
            $this->tag->setDefault("fechaInsercion",
                                   $persona_usuario->fechaInsercion);
            $this->tag->setDefault("usuarioInsercion",
                                   $persona_usuario->usuarioInsercion);
            $this->tag->setDefault("fechaModificacion",
                                   $persona_usuario->fechaModificacion);
            $this->tag->setDefault("usuarioModificacion",
                                   $persona_usuario->usuarioModificacion);

            $this->view->form = new personaUsuarioEditForm();
        }
    }

    /**
     * Creates a new persona_usuario
     */
    public function createAction() {
        parent::validarSession();
        $form = new personaUsuarioNewForm();
        if (!$this->request->isPost() || $form->isValid($this->request->getPost()) == false) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'new'
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

            $persona_usuario = new PersonaUsuario();
            $persona_usuario->Nombrespersona = $this->request->getPost("nombresPersona");
            $persona_usuario->Apellidospersona = $this->request->getPost("apellidosPersona");
            $persona_usuario->Numerodocumento = $this->request->getPost("numeroDocumento");
            $persona_usuario->Numerocelular = $this->request->getPost("numeroCelular");
            $persona_usuario->Numeroanexo = $this->request->getPost("numeroAnexo");
            $persona_usuario->Estadoregistro = 'S';
            $persona_usuario->Fechainsercion = strftime("%Y-%m-%d",
                                                        time());
            $persona_usuario->Usuarioinsercion = $username;


            if (!$persona_usuario->save()) {
                $this->flash->error('No se Realizó Registro de Persona');

                $this->dispatcher->forward([
                                'controller' => "persona_usuario",
                                'action' => 'search'
                ]);

                return;
            }

            $this->flash->success("Persona Registrada Correctamente");

            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'index'
            ]);
        }
    }

    /**
     * Saves a persona_usuario edited
     *
     */
    public function saveAction() {
        parent::validarSession();

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $codPersonaUsuario = $this->request->getPost("codPersonaUsuario");
        $persona_usuario = PersonaUsuario::findFirstBycodPersonaUsuario($codPersonaUsuario);

        if (!$persona_usuario) {
            $this->flash->error("Persona Usuaria no Existe " . $codPersonaUsuario);

            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'index'
            ]);

            return;
        }

        $form = new personaUsuarioEditForm();
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

            $persona_usuario->Nombrespersona = $this->request->getPost("nombresPersona");
            $persona_usuario->Apellidospersona = $this->request->getPost("apellidosPersona");
            $persona_usuario->Numerodocumento = $this->request->getPost("numeroDocumento");
            $persona_usuario->Numerocelular = $this->request->getPost("numeroCelular");
            $persona_usuario->Numeroanexo = $this->request->getPost("numeroAnexo");
            $persona_usuario->Estadoregistro = $this->request->getPost("estadoRegistro");
            $persona_usuario->Fechamodificacion = strftime("%Y-%m-%d",
                                                           time());
            $persona_usuario->Usuariomodificacion = $username;


            if (!$persona_usuario->save()) {

                foreach ($persona_usuario->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                                'controller' => "persona_usuario",
                                'action' => 'edit',
                                'params' => [$persona_usuario->codPersonaUsuario]
                ]);

                return;
            }

            $this->flash->success("Persona Usuaria Actualizada Satisfactoriamente");

            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'index'
            ]);
        }
    }

    /**
     * Deletes a persona_usuario
     *
     * @param string $codPersonaUsuario
     */
    public function deleteAction($codPersonaUsuario) {
        parent::validarSession();
        $persona_usuario = PersonaUsuario::findFirstBycodPersonaUsuario($codPersonaUsuario);
        if (!$persona_usuario) {
            $this->flash->error("persona_usuario was not found");

            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$persona_usuario->delete()) {

            foreach ($persona_usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "persona_usuario",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("persona_usuario was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "persona_usuario",
                        'action' => "index"
        ]);
    }

    public function resetAction() {
        parent::validarSession();

        $form = new personaUsuarioIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "persona_usuario",
                        'action' => 'index'
        ]);

        return;
    }
}