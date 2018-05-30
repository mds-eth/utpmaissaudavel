<?php

class especialidadesController extends controller {

    private $url;
    private $usuario;
    private $especialidade;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();
        $this->especialidade = new Especialidades();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        if ($this->post()) {

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

}
