<?php

class AgendamentosController extends controller {

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

            $this->agendamentos->gravaAgendaPorEspecialidades($dias);

            echo true;
        }
    }

    public function validaSeExisteOutraAgendaAtiva() {

        if ($this->post()) {

            $status = $_POST['status'];
            echo $this->agendamentos->validaSeExisteOutraAgendaAtiva($status);
        }
    }

    public function listagem() {

        $dados['agendasEspecialidades'] = $this->agendamentos->buscaTodasAgendasPorEspecialidades();
        $this->loadTemplate('agendamentos/listagem', $dados);
    }

    public function vincularPaciente() {

        $agendaEspecialidades = $this->agendamentos->buscaAgendaAtiva();

        if (!empty($agendaEspecialidades)) {
            foreach ($agendaEspecialidades as $agenda) {
                switch ($agenda['id_agenda_dias']) {
                    case 1:
                        $dados['segunda'][] = $agenda;
                        break;
                    case 2:
                        $dados['terca'][] = $agenda;
                        break;
                    case 3:
                        $dados['quarta'][] = $agenda;
                        break;
                    case 4:
                        $dados['quinta'][] = $agenda;
                        break;
                    case 5:
                        $dados['sexta'][] = $agenda;
                        break;
                }
            }
        } else {
            $dados = array();
        }

        $this->loadTemplate('agendamentos/vincularPaciente', $dados);
    }

    public function buscaPacientesCadastradosSemAgendamento() {

        if ($this->post()) {

            echo json_encode($this->agendamentos->buscaPacientesCadastradosSemAgendamento());
        }
    }

}
