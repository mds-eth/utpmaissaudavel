<?php

class pacientesController extends controller {

    private $url;
    private $usuario;
    private $unidade;
    private $especialidade;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();
        $this->unidade = new Unidades();
        $this->especialidade = new Especialidades;

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {            
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        $dados = array();

        if ($this->post()) {

            var_dump($_POST);
            die("post do pacientes");
        } else {

            $dados['unidades'] = $this->unidade->listaTodasUnidades();
            $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();

            $this->loadTemplate('pacientes/cadastrar', $dados);
        }
    }

}
