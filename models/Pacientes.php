<?php

class Pacientes extends model {

    private $convenio;
    private $fkIdPaciente;
    private $especialidades;
    private $fkIdUnidadeSaude;

    public function gravaTabelaDadosPacientes() {

        try {

            $sql = "INSERT INTO dados_pacientes(fk_id_unidade_de_saude, fk_id_paciente, convenio, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES(:fk_id_unidade_de_saude, :fk_id_paciente, :convenio, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_unidade_de_saude', $this->getFkIdUnidadeSaude(), PDO::PARAM_INT);
            $pdo->bindValue(':fk_id_paciente', $this->getFkIdPaciente(), PDO::PARAM_INT);
            $pdo->bindValue(':convenio', $this->getConvenio(), PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
            $this->gravaTabelaPacientesEspecialidades();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function gravaTabelaPacientesEspecialidades() {

        try {

            foreach ($this->getEspecialidades() as $fkIdEspecialidade) {

                $sql = "INSERT INTO paciente_especialidades(fk_id_especialidade, fk_id_paciente, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES(:fk_id_especialidade, :fk_id_paciente, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

                $pdo = $this->db->prepare($sql);

                $pdo->bindValue(':fk_id_especialidade', $fkIdEspecialidade, PDO::PARAM_INT);
                $pdo->bindValue(':fk_id_paciente', $this->getFkIdPaciente(), PDO::PARAM_INT);
                $pdo->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
                $pdo->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
                $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

                $pdo->execute();
            }
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function listaTodosPacientes() {

        $sql = $this->db->prepare("SELECT * FROM dados_pacientes dp JOIN pessoas p
                        ON dp.fk_id_paciente = p.id_pessoa
                        JOIN unidades_de_saude us ON dp.fk_id_unidade_de_saude = us.id_unidade_de_saude");
        $sql->execute();

        $pacientes = $sql->fetchAll();

        return $pacientes;
    }

    function getFkIdUnidadeSaude() {
        return $this->fkIdUnidadeSaude;
    }

    function setFkIdUnidadeSaude($fkIdUnidadeSaude) {
        $this->fkIdUnidadeSaude = $fkIdUnidadeSaude;
    }

    function getConvenio() {
        return $this->convenio;
    }

    function setConvenio($convenio) {
        $this->convenio = $convenio;
    }

    function getEspecialidades() {
        return $this->especialidades;
    }

    function setEspecialidades($especialidades) {
        $this->especialidades = $especialidades;
    }

    function getFkIdPaciente() {
        return $this->fkIdPaciente;
    }

    function setFkIdPaciente($fkIdPaciente) {
        $this->fkIdPaciente = $fkIdPaciente;
    }

}
