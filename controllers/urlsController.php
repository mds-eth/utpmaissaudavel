<?php

class urlsController extends controller {

    private $pessoas;
    private $perfil;
    private $url;

    public function __construct() {

        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        $this->perfil = new Perfis();

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        try {

            if ($this->post()) {

                $url = $_POST['url'];
                $perfis = $_POST['perfis'];

                $retorno = $this->url->cadastrar($url, $perfis);

                echo $retorno;
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

        $dados = array();

        try {

            $dados['urls'] = $this->url->listaTodasUrls();

            $this->loadTemplate('urls/visualizar', $dados);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
