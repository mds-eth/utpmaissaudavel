<?php

class UsuariosController extends controller {

    private $url;
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function buscarAlunosParaRenderizarAgenda() {

        if ($this->post()) {

            echo json_encode($this->usuario->buscarAlunosParaRenderizarAgenda());
        }
    }

}
