<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PersonaUsuarioController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for persona_usuario
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'PersonaUsuario', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "codPersonaUsuario";

        $persona_usuario = PersonaUsuario::find($parameters);
        if (count($persona_usuario) == 0) {
            $this->flash->notice("The search did not find any persona_usuario");

            $this->dispatcher->forward([
                "controller" => "persona_usuario",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $persona_usuario,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a persona_usuario
     *
     * @param string $codPersonaUsuario
     */
    public function editAction($codPersonaUsuario)
    {
        if (!$this->request->isPost()) {

            $persona_usuario = PersonaUsuario::findFirstBycodPersonaUsuario($codPersonaUsuario);
            if (!$persona_usuario) {
                $this->flash->error("persona_usuario was not found");

                $this->dispatcher->forward([
                    'controller' => "persona_usuario",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->codPersonaUsuario = $persona_usuario->codPersonaUsuario;

            $this->tag->setDefault("codPersonaUsuario", $persona_usuario->codPersonaUsuario);
            $this->tag->setDefault("nombresPersona", $persona_usuario->nombresPersona);
            $this->tag->setDefault("ApellidosPersona", $persona_usuario->ApellidosPersona);
            $this->tag->setDefault("numeroDocumento", $persona_usuario->numeroDocumento);
            $this->tag->setDefault("numeroCelular", $persona_usuario->numeroCelular);
            $this->tag->setDefault("numeroAnexo", $persona_usuario->numeroAnexo);
            $this->tag->setDefault("estadoRegistro", $persona_usuario->estadoRegistro);
            $this->tag->setDefault("fechaInsercion", $persona_usuario->fechaInsercion);
            $this->tag->setDefault("usuarioInsercion", $persona_usuario->usuarioInsercion);
            $this->tag->setDefault("fechaModificacion", $persona_usuario->fechaModificacion);
            $this->tag->setDefault("usuarioModificacion", $persona_usuario->usuarioModificacion);
            
        }
    }

    /**
     * Creates a new persona_usuario
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "persona_usuario",
                'action' => 'index'
            ]);

            return;
        }

        $persona_usuario = new PersonaUsuario();
        $persona_usuario->Nombrespersona = $this->request->getPost("nombresPersona");
        $persona_usuario->Apellidospersona = $this->request->getPost("ApellidosPersona");
        $persona_usuario->Numerodocumento = $this->request->getPost("numeroDocumento");
        $persona_usuario->Numerocelular = $this->request->getPost("numeroCelular");
        $persona_usuario->Numeroanexo = $this->request->getPost("numeroAnexo");
        $persona_usuario->Estadoregistro = $this->request->getPost("estadoRegistro");
        $persona_usuario->Fechainsercion = $this->request->getPost("fechaInsercion");
        $persona_usuario->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $persona_usuario->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $persona_usuario->Usuariomodificacion = $this->request->getPost("usuarioModificacion");
        

        if (!$persona_usuario->save()) {
            foreach ($persona_usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "persona_usuario",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("persona_usuario was created successfully");

        $this->dispatcher->forward([
            'controller' => "persona_usuario",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a persona_usuario edited
     *
     */
    public function saveAction()
    {

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
            $this->flash->error("persona_usuario does not exist " . $codPersonaUsuario);

            $this->dispatcher->forward([
                'controller' => "persona_usuario",
                'action' => 'index'
            ]);

            return;
        }

        $persona_usuario->Nombrespersona = $this->request->getPost("nombresPersona");
        $persona_usuario->Apellidospersona = $this->request->getPost("ApellidosPersona");
        $persona_usuario->Numerodocumento = $this->request->getPost("numeroDocumento");
        $persona_usuario->Numerocelular = $this->request->getPost("numeroCelular");
        $persona_usuario->Numeroanexo = $this->request->getPost("numeroAnexo");
        $persona_usuario->Estadoregistro = $this->request->getPost("estadoRegistro");
        $persona_usuario->Fechainsercion = $this->request->getPost("fechaInsercion");
        $persona_usuario->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $persona_usuario->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $persona_usuario->Usuariomodificacion = $this->request->getPost("usuarioModificacion");
        

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

        $this->flash->success("persona_usuario was updated successfully");

        $this->dispatcher->forward([
            'controller' => "persona_usuario",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a persona_usuario
     *
     * @param string $codPersonaUsuario
     */
    public function deleteAction($codPersonaUsuario)
    {
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

}
