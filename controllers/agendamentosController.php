<?php

class agendamentosController extends controller {

    private $url;
    private $usuario;
    private $agendamentos;
    private $especialidade;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        $this->agendamentos = new Agendamentos();
        $this->especialidade = new Especialidades();

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function agenda() {

        $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();

        $this->loadTemplate('agendamentos/agenda', $dados);
    }

    public function cadastrarAgendaPorEspecialidade() {

        if ($this->post()) {

            $this->agendamentos->setDataInicial(!empty($_POST['dataInicial']) ? $_POST['dataInicial'] : null);
            $this->agendamentos->setDataFinal(!empty($_POST['dataFinal']) ? $_POST['dataFinal'] : null);
            $this->agendamentos->setSegunda(!empty($_POST['segunda']) ? $_POST['segunda'] : null);
            $this->agendamentos->setTerca(!empty($_POST['terca']) ? $_POST['terca'] : null);
            $this->agendamentos->setQuarta(!empty($_POST['quarta']) ? $_POST['quarta'] : null);
            $this->agendamentos->setQuinta(!empty($_POST['quinta']) ? $_POST['quinta'] : null);
            $this->agendamentos->setSexta(!empty($_POST['sexta']) ? $_POST['sexta'] : null);
            $this->agendamentos->gravaAgendaSegunda();
        }
    }

}
