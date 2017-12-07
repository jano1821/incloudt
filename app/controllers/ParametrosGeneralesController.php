<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
class ParametrosGeneralesController extends ControllerBase {

    public function onConstruct(){
        parent::validarAdministradores();
    }
    
    public function indexAction() {
        parent::validarSession();
        
        $usuarioSesion = $this->session->get("Usuario");
        $indicadorUsuarioAdministrador = $usuarioSesion['indicadorUsuarioAdministrador'];
        $codEmpresa = $usuarioSesion['codEmpresa'];
        
        if ($indicadorUsuarioAdministrador!='Z'){
            $empresa = $this->modelsManager->createBuilder()
                                    ->columns("em.codEmpresa," .
                                              "em.nombreEmpresa")
                                    ->addFrom('Empresa',
                                              'em')
                                    ->andWhere("em.estadoRegistro = 'S' ")
                                    ->andWhere("em.codEmpresa = '".$codEmpresa."' ")
                                    ->orderBy('em.nombreEmpresa')
                                    ->getQuery()
                                    ->execute();
        }else{
            $parameters['order'] = "nombreEmpresa ASC";
            $empresa = Empresa::find($parameters);
        }

        $this->view->empresa = $empresa;
        $this->view->form = new Parametros_GeneralesIndexForm();
    }

    /**
     * Searches for parametros_generales
     */
    public function searchAction() {
        parent::validarSession();
        
        $codEmpresa = $this->request->getPost("codEmpresa");
        $identificadorParametro = $this->request->getPost("identificadorParametro");
        $descipcionParametro = $this->request->getPost("descipcionParametro");
        $valorParametro = $this->request->getPost("valorParametro");
        $indicadorFijo = $this->request->getPost("indicadorFijo");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        $parametros_generales = $this->modelsManager->createBuilder()
                                ->columns("pg.codParametro," .
                                          "pg.identificadorParametro," .
                                          "pg.descipcionParametro," .
                                          "pg.codEmpresa," .
                                          "pg.valorParametro," .
                                          "if(pg.indicadorFijo='S','Fijo','Variable') as indicadorFijo," .
                                          "if(pg.estadoRegistro='S','Vigente','No Vigente') as estado")
                                ->addFrom('ParametrosGenerales',
                                          'pg')
                                ->innerJoin('Empresa',
                                            'pg.codEmpresa = em.codEmpresa',
                                            'em')
                                ->andWhere('pg.codEmpresa like :codEmpresa: AND ' .
                                                        'pg.identificadorParametro like :identificadorParametro: AND ' .
                                                        'pg.descipcionParametro like :descipcionParametro: AND ' .
                                                        'pg.valorParametro like :valorParametro: AND ' .
                                                        'pg.indicadorFijo like :indicadorFijo: AND ' .
                                                        'pg.estadoRegistro like :estado: ',
                                           [
                                                'codEmpresa' => "%" . $codEmpresa . "%",
                                                'identificadorParametro' => "%" . $identificadorParametro . "%",
                                                'descipcionParametro' => "%" . $descipcionParametro . "%",
                                                'valorParametro' => "%" . $valorParametro . "%",
                                                'indicadorFijo' => "%" . $indicadorFijo . "%",
                                                'estado' => "%" . $estado . "%",
                                                        ]
                                )
                                ->orderBy('pg.descipcionParametro')
                                ->getQuery()
                                ->execute();
        

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($parametros_generales) / 10) + 1) {
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
            $pagina = floor(count($parametros_generales) / 10) + 1;
        }

        if (count($parametros_generales) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "parametros_generales",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $parametros_generales,
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
        
        $usuarioSesion = $this->session->get("Usuario");
        $codEmpresa = $usuarioSesion['codEmpresa'];
        $indicadorUsuarioAdministrador = $usuarioSesion['indicadorUsuarioAdministrador'];
        
        if ($indicadorUsuarioAdministrador!='Z'){
            $empresa = $this->modelsManager->createBuilder()
                                    ->columns("em.codEmpresa," .
                                              "em.nombreEmpresa")
                                    ->addFrom('Empresa',
                                              'em')
                                    ->andWhere("em.estadoRegistro = 'S' ")
                                    ->andWhere("em.codEmpresa = '".$codEmpresa."' ")
                                    ->orderBy('em.nombreEmpresa')
                                    ->getQuery()
                                    ->execute();
        }else{
            $parameters['order'] = "nombreEmpresa ASC";
            $empresa = Empresa::find($parameters);
        }
        
        $this->view->empresa = $empresa;
        $this->view->form = new Parametros_GeneralesNewForm();
    }

    /**
     * Edits a parametros_generale
     *
     * @param string $codParametro
     */
    public function editAction($codParametro) {
        parent::validarSession();
        
        $usuarioSesion = $this->session->get("Usuario");
        $indicadorUsuarioAdministrador = $usuarioSesion['indicadorUsuarioAdministrador'];
        $codEmpresa = $usuarioSesion['codEmpresa'];
        
        if ($indicadorUsuarioAdministrador!='Z'){
            $empresa = $this->modelsManager->createBuilder()
                                    ->columns("em.codEmpresa," .
                                              "em.nombreEmpresa")
                                    ->addFrom('Empresa',
                                              'em')
                                    ->andWhere("em.estadoRegistro = 'S' ")
                                    ->andWhere("em.codEmpresa = '".$codEmpresa."' ")
                                    ->orderBy('em.nombreEmpresa')
                                    ->getQuery()
                                    ->execute();
        }else{
            $parameters['order'] = "nombreEmpresa ASC";
            $empresa = Empresa::find($parameters);
        }
        
        if (!$this->request->isPost()) {

            $parametros_generale = ParametrosGenerales::findFirstBycodParametro($codParametro);
            if (!$parametros_generale) {
                $this->flash->error("Parametro No Encontrado");

                $this->dispatcher->forward([
                                'controller' => "parametros_generales",
                                'action' => 'index'
                ]);

                return;
            }

            $this->view->codParametro = $parametros_generale->codParametro;

            $this->tag->setDefault("codParametro",
                                   $parametros_generale->codParametro);
            $this->tag->setDefault("codEmpresa",
                                   $parametros_generale->codEmpresa);
            $this->tag->setDefault("identificadorParametro",
                                   $parametros_generale->identificadorParametro);
            $this->tag->setDefault("descipcionParametro",
                                   $parametros_generale->descipcionParametro);
            $this->tag->setDefault("valorParametro",
                                   $parametros_generale->valorParametro);
            $this->tag->setDefault("indicadorFijo",
                                   $parametros_generale->indicadorFijo);
            $this->tag->setDefault("estadoRegistro",
                                   $parametros_generale->estadoRegistro);
            
            $this->view->empresa = $empresa;
            $this->view->form = new Parametros_GeneralesEditForm();
            
        }
    }

    /**
     * Creates a new parametros_generale
     */
    public function createAction() {
        parent::validarSession();
        
        $usuarioSesion = $this->session->get("Usuario");
        $codEmpresa = $usuarioSesion['codEmpresa'];
        $username = $usuarioSesion['nombreUsuario'];
        
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'index'
            ]);

            return;
        }

        $parametros_generale = new ParametrosGenerales();
        $parametros_generale->Codempresa = $codEmpresa;
        $parametros_generale->Identificadorparametro = $this->request->getPost("identificadorParametro");
        $parametros_generale->Descipcionparametro = $this->request->getPost("descipcionParametro");
        $parametros_generale->Valorparametro = $this->request->getPost("valorParametro");
        $parametros_generale->IndicadorFijo = $this->request->getPost("indicadorFijo");
        $parametros_generale->Estadoregistro = 'S';
        $parametros_generale->Fechainsercion = strftime("%Y-%m-%d",time());
        $parametros_generale->Usuarioinsercion = $username;


        if (!$parametros_generale->save()) {
            foreach ($parametros_generale->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Parametro Registrado Satisfactoriamente");

        $this->dispatcher->forward([
                        'controller' => "parametros_generales",
                        'action' => 'index'
        ]);
    }

    /**
     * Saves a parametros_generale edited
     *
     */
    public function saveAction() {
        parent::validarSession();
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'index'
            ]);

            return;
        }

        $codParametro = $this->request->getPost("codParametro");
        $parametros_generale = ParametrosGenerales::findFirstBycodParametro($codParametro);

        if (!$parametros_generale) {
            $this->flash->error("Parametro No Existe " . $codParametro);

            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'index'
            ]);

            return;
        }

        $form = new Parametros_GeneralesEditForm();
        if (!$this->request->isPost() || $form->isValid($this->request->getPost()) == false) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'edit'
            ]);

            return;
        }else {
            if ($this->session->has("Usuario")) {
                $usuarioSesion = $this->session->get("Usuario");
                $username = $usuarioSesion['nombreUsuario'];
                
                $parametros_generale->Codempresa = $this->request->getPost("codEmpresa");
                $parametros_generale->Identificadorparametro = $this->request->getPost("identificadorParametro");
                $parametros_generale->Descipcionparametro = $this->request->getPost("descipcionParametro");
                $parametros_generale->Valorparametro = $this->request->getPost("valorParametro");
                $parametros_generale->IndicadorFijo = $this->request->getPost("indicadorFijo");
                $parametros_generale->Estadoregistro = $this->request->getPost("estadoRegistro");
                $parametros_generale->Fechamodificacion = strftime("%Y-%m-%d",time());
                $parametros_generale->Usuariomodificacion = $username;
            }else {
                $this->session->destroy();
                $this->response->redirect('index');
            }

            if (!$parametros_generale->save()) {
                foreach ($usuario->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                                'controller' => "parametros_generales",
                                'action' => 'edit',
                                'params' => [$parametros_generale->codParametro]
                ]);

                return;
            }
        }

        $this->flash->success("Parametro Actualizado Satisfatoriamente");

        $this->dispatcher->forward([
                        'controller' => "parametros_generales",
                        'action' => 'index'
        ]);
    }

    /**
     * Deletes a parametros_generale
     *
     * @param string $codParametro
     */
    public function deleteAction($codParametro) {
        $parametros_generale = ParametrosGenerales::findFirstBycodParametro($codParametro);
        if (!$parametros_generale) {
            $this->flash->error("parametros_generale was not found");

            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'index'
            ]);

            return;
        }

        if (!$parametros_generale->delete()) {

            foreach ($parametros_generale->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "parametros_generales",
                            'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("parametros_generale was deleted successfully");

        $this->dispatcher->forward([
                        'controller' => "parametros_generales",
                        'action' => "index"
        ]);
    }
    
    public function resetAction() {
        parent::validarSession();

        $form = new Parametros_GeneralesIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "parametros_generales",
                        'action' => 'index'
        ]);

        return;
    }
}