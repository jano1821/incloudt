<?php

class MenuController extends ControllerBase {

    public function indexAction() {
        parent::validarSession();

        $this->view->menu = "";
    }

    /**
     * Searches for menu
     */
    public function menuPrincipalAction() {
        parent::validarSession();
    }
}