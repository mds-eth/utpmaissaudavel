<?php

class unidadesController extends controller {

    private $url;
    private $pessoa;
    private $unidade;

    public function __construct() {

        $this->url = new Urls();
        $this->pessoa = new Pessoas();
        $this->unidade = new Unidades();

        if (!$this->pessoa->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        if ($this->post()) {

            $unidade = $_POST['unidade'];

            $this->unidade->setUnidade($unidade);
            echo $this->unidade->gravar();
        } else {

            $dados = array();

            $this->loadTemplate('unidades/cadastrar', $dados);
        }
    }

    public function visualizar() {

        $dados['unidades'] = $this->unidade->listaTodasUnidades();

        $this->loadTemplate('unidades/visualizar', $dados);
    }

}
