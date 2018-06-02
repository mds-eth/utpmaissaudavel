<?php

class unidadesController extends controller {

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

            $unidade = $_POST['unidade'];

            $this->unidade->setUnidade($unidade);
            echo $this->unidade->gravar();
        } else {

            $dados = array();

            $this->loadTemplate('unidades/cadastrar', $dados);
        }
    }

    public function editar() {

        if ($this->post()) {

            $unidade = $_POST['unidade'];
            $id = $_POST['idUnidade'];

            $this->unidade->setUnidade($unidade);
            $this->unidade->editar($id);

            echo true;
        }
    }

    public function excluir() {

        if ($this->post()) {

            $this->unidade->excluir($_POST['idUnidade']);

            echo true;
        }
    }

    public function buscaUnidadeParaEdicao() {

        if ($this->post()) {

            $id = $_POST['id'];

            $unidade = $this->unidade->buscaUnidadeParaEdicao($id);

            echo json_encode($unidade);
        }
    }

    public function buscaUnidadeParaExclusao() {

        if ($this->post()) {

            $id = $_POST['id'];

            $unidade = $this->unidade->buscaUnidadeParaEdicao($id);

            echo json_encode($unidade);
        }
    }

    public function visualizar() {

        $dados['unidades'] = $this->unidade->listaTodasUnidades();

        $this->loadTemplate('unidades/visualizar', $dados);
    }

}
