<?php

class MenuController extends ControllerBase {

    public function indexAction() {
        parent::validarSession();
        
        $usuarioSesion = $this->session->get("Usuario");
        $codUsuario = $usuarioSesion['codUsuario'];
        $codEmpresa = $usuarioSesion['codEmpresa'];
        
        $usuarioSistema = $this->modelsManager->createBuilder()
                                ->columns("si.etiquetaSistema, ".
                                          "si.urlSistema, ".
                                          "si.urlIcono ")
                                ->addFrom('UsuarioSistema',
                                          'ui')
                                ->innerJoin('Usuario',
                                                    'us.codUsuario = ui.codUsuario',
                                                    'us')
                                ->innerJoin('Sistema',
                                                    'si.codSistema = ui.codSistema',
                                                    'si')
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
        $this->view->menu = $usuarioSistema;
    }

    /**
     * Searches for menu
     */
    public function menuPrincipalAction() {
        parent::validarSession();
    }
}