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

    public function cadastrar() {
            
        try {

            if (isset($_POST['url']) && !empty($_POST['url'])) {

                var_dump($_POST);
                die("cai aqui");
            } else {

                $dados = array();
                $dados['perfil'] = $this->perfil->buscaPerfis();

                $this->loadTemplate('urls/cadastrar', $dados);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function visualizar() {
        
    }

}
