<?php

class AvaliacoesController extends controller {

    private $url;
    private $log;
    private $usuario;
    private $paciente;
    private $avaliacao;

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
        $this->paciente = new Pacientes();
        $this->avaliacao = new Avaliacoes();
    }

    public function paciente($id) {

        $dados['paciente'] = $this->paciente->listaFichaPaciente($id);

        if (!is_null($dados['paciente'])) {
            $this->loadTemplate('avaliacoes/pneumologia', $dados);
        } else {
            header('Location: ' . URL . '/home');
        }
    }

    public function salvaDadosFormPneumologia() {

        if ($this->post()) {

            var_dump($_POST);
            die('salvaDadosFormPneumologia');
        }
    }

}
