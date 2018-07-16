<?php

class FormulariosController extends controller {

    private $log;
    private $url;
    private $usuario;
    private $especialidade;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }

        $this->log = new Logs();
        $this->especialidade = new Especialidades();
    }

    public function cadastrar() {

        $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();

        if ($this->post()) {
            
        } else {
            $this->loadTemplate('formularios/cadastrar', $dados);
        }
    }

    public function pilares() {

        $dados = [];

        $this->loadTemplate('formularios/pilares', $dados);
    }

    public function pneumologia() {


        $dados = [];

        $this->loadTemplate('formularios/pneumologia', $dados);
    }

}
