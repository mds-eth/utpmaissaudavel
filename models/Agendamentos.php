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

                        $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, 
                                    fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                                    status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, 
                                    agenda_dias_especialidades_atualizado_por, 
                                    agenda_dias_especialidades_atualizado_em) 
                                    VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                                    :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                                    :agenda_dias_especialidades_atualizado_em)");

                        $sql->bindValue(':fk_id_especialidade', $unico, PDO::PARAM_INT);
                        $sql->bindValue(':fk_id_agenda_dias', $this->fk, PDO::PARAM_INT);
                        $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                        $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                        $sql->bindValue(':status', 1, PDO::PARAM_INT);
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

        $retorno = $sql->fetchAll();

        return empty($retorno) ? true : false;
    }

    public function validaSeExisteOutraAgendaAtiva($status) {

        $sql = $this->db->prepare("SELECT status FROM agenda_dias_especialidades ad WHERE status = :status LIMIT 1");
        $sql->bindValue(':status', $status, PDO::PARAM_INT);
        $sql->execute();

        $retorno = $sql->fetchAll();

        return empty($retorno) ? true : false;
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
