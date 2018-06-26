<?php

class Agendamentos extends model {

    private $fk = 1;
    private $dataInicial;
    private $dataFinal;

    public function gravaAgendaPorEspecialidades($dias) {

        $validaDatas = $this->validaDatasAgendaEspecialidade();

        if ($validaDatas) {

            try {

                foreach ($dias as $dia) {

                    foreach ($dia as $unico) {

                        $mes = date('m');
                        $semestre = $mes <= 6 ? 1 : 2;

                        $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, 
                                    fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                                    status, semestre, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, 
                                    agenda_dias_especialidades_atualizado_por, 
                                    agenda_dias_especialidades_atualizado_em) 
                                    VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                                    :status, :semestre, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                                    :agenda_dias_especialidades_atualizado_em)");

                        $sql->bindValue(':fk_id_especialidade', $unico, PDO::PARAM_INT);
                        $sql->bindValue(':fk_id_agenda_dias', $this->fk, PDO::PARAM_INT);
                        $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                        $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                        $sql->bindValue(':status', 1, PDO::PARAM_INT);
                        $sql->bindValue(':semestre', $semestre, PDO::PARAM_INT);
                        $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                        $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                        $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                        $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                        $sql->execute();
                    }

                    $this->fk = $this->fk + 1;
                }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            return true;
        } else {
            return false;
        }
    }

    public function validaDatasAgendaEspecialidade() {

        $sql = $this->db->prepare("SELECT data_inicio_agenda, data_fim_agenda 
                    FROM agenda_dias_especialidades ad 
                    WHERE ad.data_inicio_agenda = :inicio
                    AND ad.data_fim_agenda = :fim LIMIT 1");

        $sql->bindValue(':inicio', $this->getDataInicial(), PDO::PARAM_STR);
        $sql->bindValue(':fim', $this->getDataFinal(), PDO::PARAM_STR);
        $sql->execute();

        return empty($retorno = $sql->fetchAll()) ? true : false;
    }

    public function validaSeExisteOutraAgendaAtiva($status) {

        $sql = $this->db->prepare("SELECT status FROM agenda_dias_especialidades ad WHERE status = :status LIMIT 1");
        $sql->bindValue(':status', $status, PDO::PARAM_INT);
        $sql->execute();

        return empty($retorno = $sql->fetchAll()) ? true : false;
    }

    public function buscaTodasAgendasPorEspecialidades() {

        $sql = $this->db->prepare("SELECT * FROM agenda_dias_especialidades");
        $sql->execute();

        $agendas = $sql->fetchAll();

        return $agendas;
    }

    public function buscarPacientesCadastradosSemAgendamento() {

        $sql = $this->db->prepare("SELECT id_pessoa, nome_pessoa, convenio, responsavel, nome_unidade, especialidade
                                FROM pessoas p 
                                JOIN dados_pacientes dp 
                                ON p.id_pessoa = dp.fk_id_paciente 
                                JOIN unidades_de_saude us
                                ON dp.fk_id_unidade_de_saude = us.id_unidade_de_saude  
                                JOIN paciente_especialidades pe
                                JOIN especialidades e
                                ON pe.fk_id_especialidade = e.id_especialidade
                                AND pe.fk_id_paciente = p.id_pessoa
                                ORDER BY p.id_pessoa DESC LIMIT 1");
        $sql->execute();

        return !empty($pacientes = $sql->fetchAll()) ? $pacientes : null;
    }

    public function buscaAgendaAtiva() {

        $sql = $this->db->prepare("SELECT id_agenda_dias_especialidades, fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda,
                    data_fim_agenda, status, semestre,
                    id_agenda_dias, dia_semana, id_especialidade, especialidade
                    FROM agenda_dias_especialidades ae
                    JOIN agenda_dias ad ON ae.fk_id_agenda_dias = ad.id_agenda_dias
                    JOIN especialidades e ON ae.fk_id_especialidade = e.id_especialidade
                    AND ae.status = 1");
        $sql->execute();

        $agenda = $sql->fetchAll();

        return $agenda;
    }

    public function buscaPacientesAlunoSelecionado($id) {

        $sql = $this->db->prepare("SELECT id_pessoa, nome_pessoa, data_sessao, hora_inicio, hora_fim FROM pessoas p
                        JOIN agendamentos a ON p.id_pessoa = a.fk_id_paciente
                        AND a.fk_id_aluno = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        return !empty($return = $sql->fetchAll()) ? $return : null;
    }

    public function gravaAgendaInicialPaciente($sessoes, $fkIdAluno, $fkIdPaciente) {

        try {

            foreach ($sessoes as $sessao) {

                $sql = $this->db->prepare("INSERT INTO agendamentos(fk_id_aluno, fk_id_paciente, data_sessao, hora_inicio, hora_fim, agendamento_criado_por, 
                                    agendamento_criado_em, agendamento_atualizado_por, agendamento_atualizado_em) 
                                    VALUES(:fk_id_aluno, :fk_id_paciente, :data_sessao, :hora_inicio, :hora_fim, :agendamento_criado_por, :agendamento_criado_em, 
                                    :agendamento_atualizado_por, :agendamento_atualizado_em)");

                $sql->bindValue(':fk_id_aluno', $fkIdAluno, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_paciente', $fkIdPaciente, PDO::PARAM_INT);
                $sql->bindValue(':data_sessao', $sessao['data'], PDO::PARAM_STR);
                $sql->bindValue(':hora_inicio', $sessao['horaInicio'], PDO::PARAM_STR);
                $sql->bindValue(':hora_fim', $sessao['horaFim'], PDO::PARAM_STR);
                $sql->bindValue(':agendamento_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agendamento_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agendamento_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agendamento_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            $this->gravaTabelaAlunosPacientes($fkIdAluno, $fkIdPaciente);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        return true;
    }

    public function gravaTabelaAlunosPacientes($fkIdAluno, $fkIdPaciente) {

        try {

            $sql = $this->db->prepare("INSERT INTO alunos_pacientes(fk_id_aluno, fk_id_paciente, status, aluno_paciente_criado_por, 
                                    aluno_paciente_criado_em, aluno_paciente_atualizado_por, aluno_paciente_atualizado_em) 
                                    VALUES(:fk_id_aluno, :fk_id_paciente, :status, :aluno_paciente_criado_por, :aluno_paciente_criado_em, 
                                    :aluno_paciente_atualizado_por, :aluno_paciente_atualizado_em)");

            $sql->bindValue(':fk_id_aluno', $fkIdAluno, PDO::PARAM_INT);
            $sql->bindValue(':fk_id_paciente', $fkIdPaciente, PDO::PARAM_INT);
            $sql->bindValue(':status', 1, PDO::PARAM_INT);
            $sql->bindValue(':aluno_paciente_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':aluno_paciente_criado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':aluno_paciente_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':aluno_paciente_atualizado_em', $this->date, PDO::PARAM_STR);

            $sql->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

}
