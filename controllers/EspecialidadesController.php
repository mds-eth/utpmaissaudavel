<?php

class EspecialidadesController extends controller {

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

        $this->especialidade = new Especialidades();
    }

    public function cadastrar() {

        if ($this->post()) {

            $this->especialidade->setCor(trim(addslashes($_POST['cor'])));
            $this->especialidade->setEspecialidade(trim(addslashes($_POST['especialidade'])));
            $this->especialidade->setDescricao(trim(addslashes($_POST['descricao'])));
            echo $this->especialidade->gravar();
        } else {

            $dados = array();
            $this->loadTemplate('especialidades/cadastrar', $dados);
        }
    }

    public function visualizar() {

        $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();
        $this->loadTemplate('especialidades/visualizar', $dados);
    }

    public function buscaEspecialidade() {

        if ($this->post()) {

            echo json_encode($this->especialidade->buscaEspecialidade($_POST['id']));
        }
    }

    public function especialidade($id) {

        $dados['especialidade'] = $this->especialidade->buscaEspecialidade($id);

        if (is_null($dados['especialidade'])) {
            header('Location: ' . URL . '/especialidades/visualizar');
        } else {
            $this->loadTemplate('especialidades/especialidade', $dados);
        }
    }

    public function editarEspecialidade() {

        if ($this->post()) {

            $this->especialidade->setCor(trim(addslashes($_POST['cor'])));
            $this->especialidade->setEspecialidade(trim(addslashes($_POST['especialidade'])));
            $this->especialidade->setDescricao(trim(addslashes($_POST['descricao'])));
            echo $this->especialidade->editarEspecialidade($_POST['id']);
        }
    }

}
