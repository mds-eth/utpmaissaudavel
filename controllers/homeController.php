<?php

class homeController extends controller {

    private $url;
    private $usuario;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
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
