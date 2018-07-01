<?php

class FormulariosController extends controller {

    private $log;
    private $url;
    private $usuario;

    public function __construct() {

        $this->usuario = new Usuarios();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->log = new Logs();
        $this->url = new Urls();

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        $dados = [];

        if ($this->post()) {
            
        } else {
            $this->loadTemplate('formularios/cadastrar', $dados);
        }
    }

}
