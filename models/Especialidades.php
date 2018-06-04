<?php

class Especialidades extends model {

    private $descricao;
    private $especialidade;

    public function gravar() {

        $valida = $this->validaEspecialidade();

        if ($valida) {

            try {

                $sql = $this->db->prepare("INSERT INTO especialidades(especialidade, descricao, especialidade_criado_por, especialidade_criado_em,
                    especialidade_atualizado_por, especialidade_atualizado_em) 
                    VALUES(:especialidade, :descricao, :especialidade_criado_por, :especialidade_criado_em,
                    :especialidade_atualizado_por, :especialidade_atualizado_em)");

                $sql->bindValue(':especialidade', $this->getEspecialidade(), PDO::PARAM_STR);
                $sql->bindValue(':descricao', $this->getDescricao(), PDO::PARAM_STR);
                $sql->bindValue(':especialidade_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_criado_em', $this->date, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':especialidade_atualizado_em', $this->date, PDO::PARAM_INT);

                $sql->execute();

                return true;
            } catch (Exception $exc) {

                echo $exc->getTraceAsString();
            }
        } else {
            return false;
        }
    }

    public function listaTodasEspecialidades() {

        $sql = $this->db->prepare("SELECT * FROM especialidades");
        $sql->execute();

        $retorno = $sql->fetchAll();

        return $retorno;
    }

    public function validaEspecialidade() {

        $sql = $this->db->prepare("SELECT especialidade FROM especialidades WHERE especialidade = :especialidade");
        $sql->bindValue(':especialidade', $this->getEspecialidade(), PDO::PARAM_STR);
        $sql->execute();

        $retorno = $sql->fetchObject();

        if (empty($retorno)) {
            return true;
        } else {
            return false;
        }
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

}
