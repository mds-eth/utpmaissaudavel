<?php

class UnidadesController extends controller {

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

            $this->unidade->setUnidade(trim(addslashes($_POST['unidade'])));
            $this->unidade->setFkIdRegional(trim(addslashes($_POST['idRegional'])));
            echo $this->unidade->gravar();
        } else {

            $dados['regionais'] = $this->unidade->listaRegionais();

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

            $unidade['unidade'] = $this->unidade->buscaUnidadeParaEdicao($id);
            $unidade['regionais'] = $this->unidade->listaRegionais();           

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

    public function regional() {

        $dados = array();

        $this->loadTemplate('unidades/regional', $dados);
    }

    public function cadastrarRegional() {

        if ($this->post()) {

            $this->unidade->setRegional(trim(addslashes($_POST['regional'])));
            $this->unidade->setResponsavel(trim(addslashes($_POST['responsavel'])));
            echo $this->unidade->cadastrarRegional();
        }
    }

    public function regionais() {

        $dados['regionais'] = $this->unidade->listaRegionais();

        $this->loadTemplate('unidades/regionais', $dados);
    }

    public function buscaRegionalParaEdicao() {

        if ($this->post()) {

            $regional = $this->unidade->buscaRegionalParaEdicao($_POST['id']);

            echo json_encode($regional);
        }
    }

    public function editarRegional() {

        if ($this->post()) {

            $this->unidade->setFkIdRegional($_POST['id']);
            $this->unidade->setRegional(trim(addslashes($_POST['nomeRegional'])));
            $this->unidade->setResponsavel(trim(addslashes($_POST['responsavel'])));
            echo $this->unidade->editarRegional();
        }
    }

}
