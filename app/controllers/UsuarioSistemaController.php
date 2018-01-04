<?php

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
        parent::validarSession();
        
        $codUsuario = $this->request->getPost("codUsuario");
        $codSistema = $this->request->getPost("codSistema");
        $estado = $this->request->getPost("estadoRegistro");
        $pagina = $this->request->getPost("pagina");
        $avance = $this->request->getPost("avance");

        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }

        $usuarioSistema = $this->modelsManager->createBuilder()
                                ->columns("ui.codSistema, ".
                                          "ui.codUsuario, ".
                                          "si.etiquetaSistema, ".
                                          "us.nombreUsuario, ".
                                          "if(ui.estadoRegistro='S','Vigente','No Vigente') as estado ")
                                ->addFrom('UsuarioSistema',
                                          'ui')
                                ->innerJoin('Usuario',
                                                    'us.codUsuario = ui.codUsuario',
                                                    'us')
                                ->innerJoin('Sistema',
                                                    'si.codSistema = ui.codSistema',
                                                    'si')
                                ->andWhere('ui.codUsuario like :usuario: AND ' .
                                           'ui.codSistema like :sistema: AND ' .
                                           'ui.estadoRegistro like :estado: ',
                                           [
                                                'usuario' => "%".$codUsuario."%",
                                                'sistema' => "%".$codSistema."%",
                                                'estado' => "%".$estado."%",
                                           ]
                                )
                                            
                                ->getQuery()
                                ->execute();
        
        if ($pagina == "") {
            $pagina = 1;
        }
        if ($avance == "" || $avance == "0") {
            $pagina = 1;
        }else if ($avance == 1) {
            if ($pagina < floor(count($usuarioSistema) / 10) + 1) {
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
            $pagina = floor(count($usuarioSistema) / 10) + 1;
        }

        if (count($usuarioSistema) == 0) {
            $this->flash->notice("La Búqueda no ha Obtenido Resultados");

            $this->dispatcher->forward([
                            "controller" => "usuario_sistema",
                            "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
                        'data' => $usuarioSistema,
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

        $this->view->form = new UsuarioSistemaNewForm();
    }

    /**
     * Edits a usuario_sistema
     *
     * @param string $codUsuario
     */
    public function editAction($codUsuario,$codSistema) {
        parent::validarSession();
        
        if (!$this->request->isPost()) {

            $usuarioSistema = $this->modelsManager->createBuilder()
                                ->columns("ui.codSistema, ".
                                          "ui.codUsuario, ".
                                          "si.etiquetaSistema, ".
                                          "us.nombreUsuario, ".
                                          "ui.estadoRegistro ")
                                ->addFrom('UsuarioSistema',
                                          'ui')
                                ->innerJoin('Usuario',
                                                    'us.codUsuario = ui.codUsuario',
                                                    'us')
                                ->innerJoin('Sistema',
                                                    'si.codSistema = ui.codSistema',
                                                    'si')
                                ->andWhere('ui.codUsuario = :usuario: AND ' .
                                           'ui.codSistema = :sistema: ' ,
                                           [
                                                'usuario' => $codUsuario,
                                                'sistema' => $codSistema,
                                           ]
                                )
                                            
                                ->getQuery()
                                ->execute();
            
            if (!$usuarioSistema) {
                $this->flash->error("Usuario Sistema No Encontrado");

                $this->dispatcher->forward([
                                'controller' => "usuario_sistema",
                                'action' => 'index'
                ]);

                return;
            }
            foreach($usuarioSistema as $resp){
            //$this->view->codUsuario = $usuarioSistema->codUsuario;
            //$this->view->codSistema = $usuarioSistema->codSistema;

            $this->tag->setDefault("codUsuario",
                                   $resp->codUsuario);
            $this->tag->setDefault("nombreUsuario",
                                   $resp->nombreUsuario);
            $this->tag->setDefault("codSistema",
                                   $resp->codSistema);
            $this->tag->setDefault("nombreSistema",
                                   $resp->etiquetaSistema);
            $this->tag->setDefault("estadoRegistro",
                                   $resp->estadoRegistro);
            
            $this->view->form = new UsuarioSistemaEditForm();
            }
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

        $usuarioSistema = new UsuarioSistema();
        $usuarioSistema->CodUsuario = $this->request->getPost("codUsuario");
        $usuarioSistema->CodSistema = $this->request->getPost("codSistema");
        $usuarioSistema->Estadoregistro = 'S';


        if (!$usuarioSistema->save()) {
            foreach ($usuarioSistema->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                            'controller' => "usuario_sistema",
                            'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Relación Usuario sistema Registrada Satisfactoriamente");

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
        
        $usuario_sistema = new UsuarioSistema;

        if (!$usuario_sistema) {
            $this->flash->error("Registro No Existe " . $codUsuario);

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

        $this->flash->success("Registro Actualizado Correctamente");

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
    
    public function ajaxPostUsuarioAction(){
        $this->view->disable();
        $tabla = '';
        $contador = 0;

        if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
                $labelBusquedaUsuario = $this->request->getPost("busquedaUsuario");
                $usuarioSesion = $this->session->get("Usuario");
                $indicadorUsuarioAdministrador = $usuarioSesion['indicadorUsuarioAdministrador'];
                if ($indicadorUsuarioAdministrador!='Z'){
                    $codEmpresa = $usuarioSesion['codEmpresa'];
                    $codUsuario = $usuarioSesion['codUsuario'];
                }else{
                    $codEmpresa = "%";
                    $codUsuario = "";
                }
                

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
                                        ->andWhere('us.nombreUsuario like :nombreUsuario: AND ' .
                                                   'us.codEmpresa like :empresa: AND ' .
                                                   'us.codUsuario <> :usuario: ' ,
                                                                
                                                    [
                                                        'nombreUsuario' => "%" . $labelBusquedaUsuario . "%",
                                                        'empresa' => $codEmpresa,
                                                        'usuario' => $codUsuario,
                                                    ]
                                        )
                                        ->orderBy('us.nombreUsuario')
                                        ->getQuery()
                                        ->execute();

                $tabla = '<table class="table"><tr  class="warning">
                                    <th>N°</th>
                                    <th>Usuario</th>
                                    <th>Empresa</th>
                                    <th class="text-center" style="width: 36px;">Agregar</th>
				</tr>';
                
                foreach ($usuarios as $usuario){
                    $contador++;
                    $tabla = $tabla.'<tr><td>'.$contador;
                    $tabla = $tabla.'</td><td>';
                    $tabla = $tabla.$usuario->nombreUsuario;
                    $tabla = $tabla.'</td><td>';
                    $tabla = $tabla.$usuario->nombreEmpresa;
                    $tabla = $tabla. '</td><td class="text-center"> '
                                   . '<button type="button" class="btn btn-info" '
                                   . 'id="listaUsuarios" '
                                   . 'data-dismiss="modal" '
                                   . 'onclick="agregarUsuario(\''.$usuario->codUsuario.'\', \''.$usuario->nombreUsuario.'\');"> '
                                   . '<span class="glyphicon glyphicon-plus"></span>'
                                   . '</button></td></tr>';
                }
                
                $tabla = $tabla.'<tr>
                            <td colspan=5><span class="pull-right">
                                </span>
                            </td>
                        </tr>
                    </table>';
                
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
    
    public function ajaxPostSistemaAction(){
        $this->view->disable();
        $tabla = '';
        $contador = 0;
        $arraySistemas = array();

        if ($this->request->isPost() == true) {
            if ($this->request->isAjax() == true) {
                $labelBusquedaSistema = $this->request->getPost("busquedaSistema");
                $usuarioSesion = $this->session->get("Usuario");
                $indicadorUsuarioAdministrador = $usuarioSesion['indicadorUsuarioAdministrador'];
                $codUsuario = $usuarioSesion['codUsuario'];
                $codEmpresa = $usuarioSesion['codEmpresa'];
                
                $sistemas = $this->modelsManager->createBuilder()
                                ->columns("ui.codSistema ")
                                ->addFrom('UsuarioSistema',
                                          'ui')
                                ->innerJoin('Usuario',
                                            'ui.codUsuario = us.codUsuario ',
                                            'us')
                                ->andWhere('ui.codUsuario = :usuario: AND ' .
                                           'us.codEmpresa = :empresa: AND ' .
                                           'ui.estadoRegistro = :estado: ',
                                           [
                                                'usuario' => $codUsuario,
                                                'empresa' => $codEmpresa,
                                                'estado' => "S",
                                           ]
                                )
                                            
                                ->getQuery()
                                ->execute();
                    
                foreach ($sistemas as $item) {
                    array_push($arraySistemas,
                               $item->codSistema);
                }
                if ($indicadorUsuarioAdministrador!='Z'){
                    $sistema = $this->modelsManager->createBuilder()
                                ->columns("si.codSistema, " .
                                          "si.etiquetaSistema ")
                                ->addFrom('Sistema',
                                          'si')
                                ->inWhere('si.codSistema',$arraySistemas)
                                ->andWhere('si.etiquetaSistema like :etiquetaSistema: AND ' .
                                            'si.estadoRegistro like :estado: ',
                                           [
                                                'etiquetaSistema' => "%" . $labelBusquedaSistema . "%",
                                                'estado' => "S",
                                                        ]
                                )
                                ->orderBy('si.etiquetaSistema')
                                ->getQuery()
                                ->execute();
                }else{
                    $sistema = $this->modelsManager->createBuilder()
                                ->columns("si.codSistema, " .
                                          "si.etiquetaSistema ")
                                ->addFrom('Sistema',
                                          'si')
                                ->notInWhere('si.codSistema',$arraySistemas)
                                ->andWhere('si.etiquetaSistema like :etiquetaSistema: AND ' .
                                            'si.estadoRegistro like :estado: ',
                                           [
                                                'etiquetaSistema' => "%" . $labelBusquedaSistema . "%",
                                                'estado' => "S",
                                                        ]
                                )
                                ->orderBy('si.etiquetaSistema')
                                ->getQuery()
                                ->execute();
                }
                
                
                //$pagina = $this->request->getPost("pagina");
                //$avance = $this->request->getPost("avance");

                /*if ($pagina == "") {
                    $pagina = 1;
                }
                if ($avance == "" || $avance == "0") {
                    $pagina = 1;
                }inWhere*/


                $tabla = '<table class="table"><tr  class="warning">
                                    <th>N°</th>
                                    <th>Sistema</th>
                                    <th class="text-center" style="width: 36px;">Agregar</th>
				</tr>';
                
                foreach ($sistema as $item){
                    $contador++;
                    $tabla = $tabla.'<tr><td>'.$contador;
                    $tabla = $tabla.'</td><td>';
                    $tabla = $tabla.$item->etiquetaSistema;
                    $tabla = $tabla. '</td><td class="text-center"> '
                                   . '<button type="button" class="btn btn-info" '
                                   . 'id="listaSistemas" '
                                   . 'data-dismiss="modal" '
                                   . 'onclick="agregarSistema(\''.$item->codSistema.'\', \''.$item->etiquetaSistema.'\');"> '
                                   . '<span class="glyphicon glyphicon-plus"></span>'
                                   . '</button></td></tr>';
                }
                
                $tabla = $tabla.'<tr>
                            <td colspan=5><span class="pull-right">
                                </span>
                            </td>
                        </tr>
                    </table>';
                
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
    
    public function resetAction() {
        parent::validarSession();

        $form = new UsuarioSistemaIndexForm();
        $this->view->form = $form;

        $this->dispatcher->forward([
                        'controller' => "usuario_sistema",
                        'action' => 'index'
        ]);

        return;
    }
}