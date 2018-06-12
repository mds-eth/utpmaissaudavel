<?php

class Agendamentos extends model {

    private $segunda;
    private $terca;
    private $quarta;
    private $quinta;
    private $sexta;
    private $dataInicial;
    private $dataFinal;

    public function gravaAgendaSegunda() {

        try {

            foreach ($this->getSegunda() as $segunda) {

                $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, agenda_dias_especialidades_atualizado_por, 
                agenda_dias_especialidades_atualizado_em) 
                VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                :agenda_dias_especialidades_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $segunda, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_agenda_dias', 1, PDO::PARAM_INT);
                $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                $sql->bindValue(':status', 1, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }
            $this->gravaAgendaTerca();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function gravaAgendaTerca() {

        try {

            foreach ($this->getTerca() as $terca) {

                $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, agenda_dias_especialidades_atualizado_por, 
                agenda_dias_especialidades_atualizado_em) 
                VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                :agenda_dias_especialidades_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $terca, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_agenda_dias', 2, PDO::PARAM_INT);
                $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                $sql->bindValue(':status', 1, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            $this->gravaAgendaQuarta();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function gravaAgendaQuarta() {

        try {

            foreach ($this->getQuarta() as $quarta) {

                $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, agenda_dias_especialidades_atualizado_por, 
                agenda_dias_especialidades_atualizado_em) 
                VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                :agenda_dias_especialidades_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $quarta, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_agenda_dias', 3, PDO::PARAM_INT);
                $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                $sql->bindValue(':status', 1, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            $this->gravaAgendaQuinta();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function gravaAgendaQuinta() {

        try {

            foreach ($this->getQuinta() as $quinta) {

                $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, agenda_dias_especialidades_atualizado_por, 
                agenda_dias_especialidades_atualizado_em) 
                VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                :agenda_dias_especialidades_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $quinta, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_agenda_dias', 4, PDO::PARAM_INT);
                $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                $sql->bindValue(':status', 1, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            $this->gravaAgendaSexta();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function gravaAgendaSexta() {

        try {

            foreach ($this->getSexta() as $sexta) {

                $sql = $this->db->prepare("INSERT INTO agenda_dias_especialidades(fk_id_especialidade, fk_id_agenda_dias, data_inicio_agenda, data_fim_agenda,
                status, agenda_dias_especialidades_criado_por, agenda_dias_especialidades_criado_em, agenda_dias_especialidades_atualizado_por, 
                agenda_dias_especialidades_atualizado_em) 
                VALUES(:fk_id_especialidade, :fk_id_agenda_dias, :data_inicio_agenda, :data_fim_agenda,
                :status, :agenda_dias_especialidades_criado_por, :agenda_dias_especialidades_criado_em, :agenda_dias_especialidades_atualizado_por, 
                :agenda_dias_especialidades_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $sexta, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_agenda_dias', 5, PDO::PARAM_INT);
                $sql->bindValue(':data_inicio_agenda', $this->getDataInicial(), PDO::PARAM_STR);
                $sql->bindValue(':data_fim_agenda', $this->getDataFinal(), PDO::PARAM_STR);
                $sql->bindValue(':status', 1, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':agenda_dias_especialidades_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function getSegunda() {
        return $this->segunda;
    }

    function getTerca() {
        return $this->terca;
    }

    function getQuarta() {
        return $this->quarta;
    }

    function getQuinta() {
        return $this->quinta;
    }

    function getSexta() {
        return $this->sexta;
    }

    function getDataInicial() {
        return $this->dataInicial;
    }

    function getDataFinal() {
        return $this->dataFinal;
    }

    function setSegunda($segunda) {
        $this->segunda = $segunda;
    }

    function setTerca($terca) {
        $this->terca = $terca;
    }

    function setQuarta($quarta) {
        $this->quarta = $quarta;
    }

    function setQuinta($quinta) {
        $this->quinta = $quinta;
    }

    function setSexta($sexta) {
        $this->sexta = $sexta;
    }

    function setDataInicial($dataInicial) {
        $this->dataInicial = $dataInicial;
    }

    function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;
    }

}
