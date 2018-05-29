<?php

class pacientesController extends controller {

    private $url;
    private $usuario;
    private $unidade;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();
        $this->unidade = new Unidades();

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

            $dados['unidades'] = $this->unidade->listaTodasUnidades();

            $this->loadTemplate('pacientes/cadastrar', $dados);
        }
    }

}
