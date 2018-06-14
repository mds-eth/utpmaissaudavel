<?php

class Pacientes extends model {

    private $convenio;
    private $responsavel;
    private $fkIdPaciente;
    private $especialidades;
    private $fkIdUnidadeSaude;

    public function gravaTabelaDadosPacientes() {

        try {

            $sql = "INSERT INTO dados_pacientes(fk_id_unidade_de_saude, fk_id_paciente, convenio, responsavel, dado_paciente_criado_por, dado_paciente_criado_em,
                dado_paciente_atualizado_por, dado_paciente_atualizado_em)
                VALUES(:fk_id_unidade_de_saude, :fk_id_paciente, :convenio, :responsavel, :dado_paciente_criado_por, :dado_paciente_criado_em, 
                :dado_paciente_atualizado_por, :dado_paciente_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_unidade_de_saude', $this->getFkIdUnidadeSaude(), PDO::PARAM_INT);
            $pdo->bindValue(':fk_id_paciente', $this->getFkIdPaciente(), PDO::PARAM_INT);
            $pdo->bindValue(':convenio', $this->getConvenio(), PDO::PARAM_STR);
            $pdo->bindValue(':responsavel', $this->getResponsavel(), PDO::PARAM_STR);
            $pdo->bindValue(':dado_paciente_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':dado_paciente_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':dado_paciente_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':dado_paciente_atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
            $this->gravaTabelaPacientesEspecialidades();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function gravaTabelaPacientesEspecialidades() {

        try {

            foreach ($this->getEspecialidades() as $fkIdEspecialidade) {

                $sql = $this->db->prepare("INSERT INTO paciente_especialidades(fk_id_especialidade, fk_id_paciente, p_especialidade_criado_por, p_especialidade_criado_em, 
                    p_especialidade_atualizado_por, p_especialidade_atualizado_em)
                VALUES(:fk_id_especialidade, :fk_id_paciente, :p_especialidade_criado_por, :p_especialidade_criado_em, 
                :p_especialidade_atualizado_por, :p_especialidade_atualizado_em)");

                $sql->bindValue(':fk_id_especialidade', $fkIdEspecialidade, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_paciente', $this->getFkIdPaciente(), PDO::PARAM_INT);
                $sql->bindValue(':p_especialidade_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':p_especialidade_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':p_especialidade_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':p_especialidade_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
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

        return !empty($pacientes) ? $pacientes : null;
    }

    public function listaFichaPaciente($id) {

        $sql = $this->db->prepare("SELECT * FROM dados_pacientes dp JOIN pessoas p
                            ON dp.fk_id_paciente = p.id_pessoa
                            JOIN unidades_de_saude us ON dp.fk_id_unidade_de_saude = us.id_unidade_de_saude
                            JOIN telefones t ON p.id_pessoa = t.fk_id_pessoa
                            JOIN enderecos e ON p.id_pessoa = e.fk_id_pessoa
                            JOIN regionais r ON us.fk_id_regional = r.id_regional
                            and p.id_pessoa = :id");

        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $paciente = $sql->fetchObject();

        return !empty($paciente) ? $paciente : null;
    }

    public function buscaTodasEspecialidadesPaciente($id) {

        $sql = $this->db->prepare("SELECT id_paciente_especialidade, fk_id_especialidade , fk_id_paciente, id_especialidade, especialidade
                    FROM paciente_especialidades pe 
                    JOIN especialidades e 
                    ON pe.fk_id_especialidade = e.id_especialidade
                    AND pe.fk_id_paciente = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $especialidades = $sql->fetchAll();

        return !empty($especialidades) ? $especialidades : null;
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

    function getResponsavel() {
        return $this->responsavel;
    }

    function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

}
