<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use EmpresaIndexForm as empresaIndexForm;
use EmpresaNewForm as empresaNewForm;
use EmpresaEditForm as empresaEditForm;

class EmpresaController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        $this->view->form = new empresaIndexForm();
    }

    /**
     * Searches for empresa
     */
    public function searchAction() {
        parent::validarSession();
        
        $nombreEmpresas = $this->request->getPost("nombreEmpresa");
        $identificador = $this->request->getPost("identificadorEmpresa");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        $empresa = $this->modelsManager->createBuilder()
                                ->columns("em.codEmpresa," .
                                          "em.nombreEmpresa," .
                                          "em.identificadorEmpresa," .
                                          "if(em.estadoRegistro='S','Vigente','No Vigente') as estado")
                                ->addFrom('Empresa',
                                          'em')
                                ->andWhere('em.nombreEmpresa like :nombreEmpresa: AND ' .
                                                        'em.identificadorEmpresa like :identificadorEmpresa: AND ' .
                                                        'em.estadoRegistro like :estado: ',
                                           [
                                                'nombreEmpresa' => "%" . $nombreEmpresas . "%",
                                                'identificadorEmpresa' => "%" . $identificador . "%",
                                                'estado' => "%" . $estado . "%",
                                                        ]
                                )
                                ->orderBy('em.nombreEmpresa')
                                ->getQuery()
                                ->execute();
        

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($empresa) / 10) + 1) {
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
            $pagina = floor(count($empresa) / 10) + 1;
        }

        if (count($empresa) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "empresa",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $empresa,
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
        
        $this->view->form = new empresaNewForm();
    }

    /**
     * Edits a empresa
     *
     * @param string $codEmpresa
     */
    public function editAction($codEmpresa) {
        parent::validarSession();

        if (!$this->request->isPost()) {

            $empresa = Empresa::findFirstBycodEmpresa($codEmpresa);
            if (!$empresa) {
                $this->flash->error("Empresa no Encontrada");

                $this->dispatcher->forward([
                                'controller' => "empresa",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codEmpresa = $empresa->codEmpresa;

            $this->tag->setDefault("codEmpresa",
                                   $empresa->codEmpresa);
            $this->tag->setDefault("identificadorEmpresa",
                                   $empresa->identificadorEmpresa);
            $this->tag->setDefault("nombreEmpresa",
                                   $empresa->nombreEmpresa);
            $this->tag->setDefault("estadoRegistro",
                                   $empresa->estadoRegistro);
            
            $this->view->form = new empresaEditForm();
        }
    }

    /**
     * Creates a new empresa
     */
    public function createAction() {
        parent::validarSession();
        
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'index'
            ]);

            return;
        }
        
        $form = new empresaNewForm();
        if (!$this->request->isPost() || $form->isValid($this->request->getPost()) == false) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'new'
            ]);

            return;
        } else {
            $usuarioSesion = $this->session->get("Usuario");
            $username = $usuarioSesion['nombreUsuario'];
            
            $empresa = new Empresa();
            $empresa->Nombreempresa = $this->request->getPost("nombreEmpresa");
            $empresa->IdentificadorEmpresa = $this->request->getPost("identificadorEmpresa");
            $empresa->Estadoregistro = 'S';
            $empresa->Fechainsercion = strftime("%Y-%m-%d",time());
            $empresa->Usuarioinsercion = $username;

            if (!$empresa->save()) {
                foreach ($empresa->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                                'controller' => "empresa",
                                'action' => 'new'
                ]);

                return;
            }

            $this->flash->success("Empresa Registrada Correctamente");

            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'index'
            ]);
        }
    }

    /**
     * Saves a empresa edited
     *
     */
    public function saveAction() {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'index'
            ]);

            return;
        }

        $codEmpresa = $this->request->getPost("codEmpresa");
        $empresa = Empresa::findFirstBycodEmpresa($codEmpresa);

        if (!$empresa) {
            $this->flash->error("empresa does not exist " . $codEmpresa);

            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'index'
            ]);

            return;
        }

        $empresa->Nombreempresa = $this->request->getPost("nombreEmpresa");
        $empresa->Estadoregistro = $this->request->getPost("estadoRegistro");
        $empresa->Fechainsercion = $this->request->getPost("fechaInsercion");
        $empresa->Usuarioinsercion = $this->request->getPost("usuarioInsercion");
        $empresa->Fechamodificacion = $this->request->getPost("fechaModificacion");
        $empresa->Usuariomodificacion = $this->request->getPost("usuarioModificacion");


        if (!$empresa->save()) {

            foreach ($empresa->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'edit',
                            'params' => [$empresa->codEmpresa]
            ]);

            return;
        }

        $this->flash->success("empresa was updated successfully");

        $this->dispatcher->forward([
                        'controller' => "empresa",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a empresa
     *
     * @param string $codEmpresa
     */
    public function deleteAction($codEmpresa) {
        $empresa = Empresa::findFirstBycodEmpresa($codEmpresa);
        if (!$empresa) {
            $this->flash->error("empresa was not found");

            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$empresa->delete()) {

            foreach ($empresa->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "empresa",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("empresa was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "empresa",
                        'action' => "index"
        ]);
    }
    
    public function resetAction() {
        parent::validarSession();

        $form = new personaUsuarioIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "empresa",
                        'action' => 'index'
        ]);

        return;
    }
}