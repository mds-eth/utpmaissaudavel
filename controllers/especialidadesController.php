<?php

class especialidadesController extends controller {

    private $url;
    private $usuario;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        if ($this->post()) {
            
        } else {

            $dados = array();
            $this->loadTemplate('especialidades/cadastrar', $dados);
        }
    }

}
