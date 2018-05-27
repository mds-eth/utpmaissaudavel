<?php

class pacientesController {

    private $pessoas;
    private $url;

    public function __construct() {

        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

}
