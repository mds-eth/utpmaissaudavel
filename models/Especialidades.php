<?php

class Especialidades extends model {

    private $cor;
    private $log;
    private $descricao;
    private $especialidade;

    public function __construct() {
        parent::__construct();
        $this->log = new Logs();
    }

    public function gravar() {

        $valida = $this->validaEspecialidade();

        if ($valida) {

            try {

                $sql = $this->db->prepare("INSERT INTO especialidades(especialidade, descricao, cor, especialidade_criado_por, especialidade_criado_em,
                    especialidade_atualizado_por, especialidade_atualizado_em) 
                    VALUES(:especialidade, :descricao, :cor, :especialidade_criado_por, :especialidade_criado_em,
                    :especialidade_atualizado_por, :especialidade_atualizado_em)");

                $sql->bindValue(':especialidade', $this->getEspecialidade(), PDO::PARAM_STR);
                $sql->bindValue(':descricao', $this->getDescricao(), PDO::PARAM_STR);
                $sql->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
                $sql->bindValue(':especialidade_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_criado_em', $this->date, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_atualizado_em', $this->date, PDO::PARAM_INT);

                $sql->execute();

                return true;
            } catch (Exception $exc) {
                $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
            }
        } else {
            return false;
        }
    }

    public function listaTodasEspecialidades() {

        $sql = $this->db->prepare("SELECT * FROM especialidades");
        $sql->execute();

        return !empty($retorno = $sql->fetchAll()) ? $retorno : null;
    }

    public function validaEspecialidade() {

        $sql = $this->db->prepare("SELECT especialidade FROM especialidades WHERE especialidade = :especialidade");
        $sql->bindValue(':especialidade', $this->getEspecialidade(), PDO::PARAM_STR);
        $sql->execute();

        return empty($retorno = $sql->fetchObject()) ? true : false;
    }

    public function buscaEspecialidade($id) {

        $sql = $this->db->prepare("SELECT * FROM especialidades WHERE id_especialidade = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        return !empty($especialidade = $sql->fetchObject()) ? $especialidade : null;
    }

    public function editarEspecialidade($id) {

        try {

            $sql = $this->db->prepare("UPDATE especialidades SET especialidade = :especialidade, descricao = :descricao, cor = :cor,
                especialidade_atualizado_por = :especialidade_atualizado_por, especialidade_atualizado_em = :especialidade_atualizado_em WHERE id_especialidade = :id");

            $sql->bindValue(':especialidade', $this->getEspecialidade(), PDO::PARAM_STR);
            $sql->bindValue(':descricao', $this->getDescricao(), PDO::PARAM_STR);
            $sql->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
            $sql->bindValue(':especialidade_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':especialidade_atualizado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $edit = $sql->execute();

            return $edit ? true : false;
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function buscaEspecialidadesPorCores() {

        $sql = $this->db->prepare("SELECT especialidade, cor FROM especialidades");
        $sql->execute();

        return !empty($retorno = $sql->fetchAll()) ? $retorno : null;
    }

    function getEspecialidade() {
        return $this->especialidade;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function getCor() {
        return $this->cor;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

}
