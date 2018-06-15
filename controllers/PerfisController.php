<?php

class PerfisController extends controller {

    private $perfil;
    private $usuario;
    private $url;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }
        $this->perfil = new Perfis();

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function index() {

        $dados = array();

        $this->loadTemplate('perfis/cadastrar', $dados);
    }

    public function cadastrar() {

        try {

            $dados = array();

            if (isset($_POST['perfil']) && !empty($_POST['perfil'])) {
                $perfil = trim($_POST['perfil']);
                $this->perfil->setPerfil($perfil);
                $retorno = $this->perfil->gravaPerfil();

                echo $retorno;
            } else {
                $this->loadTemplate('perfis/cadastrar', $dados);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function visualizar() {

        $dados = array();

        try {

            $dados['perfis'] = $this->perfil->buscaPerfis();

            $this->loadTemplate('perfis/visualizar', $dados);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
