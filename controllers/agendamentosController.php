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

            $dias = array(
                'segunda' => !empty($_POST['segunda']) ? $_POST['segunda'] : null,
                'terca' => !empty($_POST['terca']) ? $_POST['terca'] : null,
                'quarta' => !empty($_POST['quarta']) ? $_POST['quarta'] : null,
                'quinta' => !empty($_POST['quinta']) ? $_POST['quinta'] : null,
                'sexta' => !empty($_POST['sexta']) ? $_POST['sexta'] : null);

            echo $this->agendamentos->gravaAgendaPorEspecialidades($dias);
        }
    }

    public function validaSeExisteOutraAgendaAtiva() {

        if ($this->post()) {

            $status = $_POST['status'];
            echo $this->agendamentos->validaSeExisteOutraAgendaAtiva($status);
        }
    }

}
