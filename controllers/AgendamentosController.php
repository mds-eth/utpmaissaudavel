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

            echo json_encode($this->agendamentos->buscaPacientesAlunoSelecionado($_POST['id']));
        }
    }

    public function gravaAgendaInicialPaciente() {


        if ($this->post()) {

            $sessoes = array(
                'idAluno' => !empty($_POST['idAluno']) ? trim($_POST['idAluno']) : '',
                'idPaciente' => !empty($_POST['idPaciente']) ? trim($_POST['idPaciente']) : '',
                'dataPrimeiraSessao' => !empty($_POST['dataPrimeiraSessao']) ? trim($_POST['dataPrimeiraSessao']) : '',
                'horaInicioPrimeiraSessao' => !empty($_POST['horaInicioPrimeiraSessao']) ? trim($_POST['horaInicioPrimeiraSessao']) : '',
                'horaFimPrimeiraSessao' => !empty($_POST['horaFimPrimeiraSessao']) ? trim($_POST['horaFimPrimeiraSessao']) : '',
                'dataSegundaSessao' => !empty($_POST['dataSegundaSessao']) ? trim($_POST['dataSegundaSessao']) : '',
                'horaInicioSegundaSessao' => !empty($_POST['horaInicioSegundaSessao']) ? trim($_POST['horaInicioSegundaSessao']) : '',
                'horaFimSegundaSessao' => !empty($_POST['horaFimSegundaSessao']) ? trim($_POST['horaFimSegundaSessao']) : '',
                'dataTerceiraSessao' => !empty($_POST['dataTerceiraSessao']) ? trim($_POST['dataTerceiraSessao']) : '',
                'horaInicioTerceiraSessao' => !empty($_POST['horaInicioTerceiraSessao']) ? trim($_POST['horaInicioTerceiraSessao']) : '',
                'horaFimTerceiraSessao' => !empty($_POST['horaFimTerceiraSessao']) ? trim($_POST['horaFimTerceiraSessao']) : '',
                'dataQuartaSessao' => !empty($_POST['dataQuartaSessao']) ? trim($_POST['dataQuartaSessao']) : '',
                'horaInicioQuartaSessao' => !empty($_POST['horaInicioQuartaSessao']) ? trim($_POST['horaInicioQuartaSessao']) : '',
                'horaFimQuartaSessao' => !empty($_POST['horaFimQuartaSessao']) ? trim($_POST['horaFimQuartaSessao']) : '',
                'dataQuintaSessao' => !empty($_POST['dataQuintaSessao']) ? trim($_POST['dataQuintaSessao']) : '',
                'horaInicioQuintaSessao' => !empty($_POST['horaInicioQuintaSessao']) ? trim($_POST['horaInicioQuintaSessao']) : '',
                'horaFimQuintaSessao' => !empty($_POST['horaFimQuintaSessao']) ? trim($_POST['horaFimQuintaSessao']) : '',
                'dataSextaSessao' => !empty($_POST['dataSextaSessao']) ? trim($_POST['dataSextaSessao']) : '',
                'horaInicioSextaSessao' => !empty($_POST['horaInicioSextaSessao']) ? trim($_POST['horaInicioSextaSessao']) : '',
                'horaFimSextaSessao' => !empty($_POST['horaFimSextaSessao']) ? trim($_POST['horaFimSextaSessao']) : '',
                'dataSetimaSessao' => !empty($_POST['dataSetimaSessao']) ? trim($_POST['dataSetimaSessao']) : '',
                'horaInicioSetimaSessao' => !empty($_POST['horaInicioSetimaSessao']) ? trim($_POST['horaInicioSetimaSessao']) : '',
                'horaFimSetimaSessao' => !empty($_POST['horaFimSetimaSessao']) ? trim($_POST['horaFimSetimaSessao']) : '',
                'dataOitavaSessao' => !empty($_POST['dataOitavaSessao']) ? trim($_POST['dataOitavaSessao']) : '',
                'horaInicioOitavaSessao' => !empty($_POST['horaInicioOitavaSessao']) ? trim($_POST['horaInicioOitavaSessao']) : '',
                'horaFimOitavaSessao' => !empty($_POST['horaFimOitavaSessao']) ? trim($_POST['horaFimOitavaSessao']) : '',
                'dataNonaSessao' => !empty($_POST['dataNonaSessao']) ? trim($_POST['dataNonaSessao']) : '',
                'horaInicioNonaSessao' => !empty($_POST['horaInicioNonaSessao']) ? trim($_POST['horaInicioNonaSessao']) : '',
                'horaFimNonaSessao' => !empty($_POST['horaFimNonaSessao']) ? trim($_POST['horaFimNonaSessao']) : '',
                'dataDecimaSessao' => !empty($_POST['dataDecimaSessao']) ? trim($_POST['dataDecimaSessao']) : '',
                'horaInicioDecimaSessao' => !empty($_POST['horaInicioDecimaSessao']) ? trim($_POST['horaInicioDecimaSessao']) : '',
                'horaFimDecimaSessao' => !empty($_POST['horaFimDecimaSessao']) ? trim($_POST['horaFimDecimaSessao']) : ''
            );

            $this->agendamentos->gravaAgendaInicialPaciente($sessoes);
        }
    }

}
