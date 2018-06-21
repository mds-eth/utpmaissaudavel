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

            echo $this->agendamentos->gravaAgendaPorEspecialidades($dias);
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

    public function vinculacao() {

        $agendaEspecialidades = $this->agendamentos->buscaAgendaAtiva();
        $dados['cores'] = $this->especialidade->buscaEspecialidadesPorCores();
        $dados['alunos'] = $this->usuario->buscarAlunosParaRenderizarAgenda();

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

        $this->loadTemplate('agendamentos/vinculacao', $dados);
    }

    public function buscarPacientesCadastradosSemAgendamento() {

        if ($this->post()) {

            $dadosPaciente = $this->agendamentos->buscarPacientesCadastradosSemAgendamento();

            if (count($dadosPaciente) > 1) {

                foreach ($dadosPaciente as $paciente) {

                    $especialidades[] = $paciente['especialidade'] . ' | ';
                }

                $dadosPaciente[0]['especialidade'] = $especialidades[0] . $especialidades[1];
            }

            echo json_encode($dadosPaciente[0]);
        }
    }

    public function buscaPacientesAlunoSelecionado() {

        if ($this->post()) {
            
            var_dump($_POST);
            die('no controller');

            echo json_encode($this->agendamentos->buscaPacientesAlunoSelecionado($_POST['id']));
        }
    }

}