<?php

use LoginForm as FormLogin,
    Phalcon\Session as Session;
class IndexController extends ControllerBase {

    private function _registerSession(Usuario $usuario) {
        $this->session->set('Usuario',
                            array('codUsuario' => $usuario->codUsuario, 'nombreUsuario' => $usuario->nombreUsuario));
    }

    public function indexAction() {
        $form = new FormLogin();
        if ($this->request->isPost()) {
            if ($form->isValid($this->request->getPost()) == false) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            }else {
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $usuario = Usuario::find("nombreUsuario = '" . $username . "'");
                if (count($usuario) == 1) {
                    if ($this->security->checkHash($password,
                                                   $usuario[0]->passwordUsuario)) {
                        $this->_registerSession($usuario[0]);
                        return $this->response->redirect('menu');
                    }else {
                        $this->flash->error("Usuario o Password Incorrecto");
                    }
                }else {
                    $this->flash->error("Usuario o Password Incorrecto");
                }
            }
        }
        $this->view->form = new FormLogin();
    }

    public function logoutAction() {
        $this->session->destroy();
        $this->response->redirect('index');
    }
}