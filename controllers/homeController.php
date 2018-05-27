<?php

class homeController extends controller {

    private $pessoas;
    private $url;

    public function __construct() {

        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: ' . URL . '/login');
        }

        $dados = array();

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            $this->loadTemplate('acessonegado', $dados);
        }
    }

    public function index() {

        $dados = array();
        $this->loadTemplate('home', $dados);
    }

}
