<?php

class urlsController extends controller {

    private $pessoas;
    private $perfil;

    public function __construct() {
        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->perfil = new Perfis();
    }

    public function index() {
        
    }

    public function cadastrar() {

        var_dump($_POST);
        die('pqp');

        $dados = array();
        $dados['perfil'] = $this->perfil->buscaPerfis();

        $this->loadTemplate('urls/cadastrar', $dados);
    }

    public function visualizar() {
        
    }

}
