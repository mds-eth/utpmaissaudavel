<?php

class Unidades extends model {

    private $unidade;

    public function gravar() {

        try {

            $sql = $this->db->prepare("INSERT INTO unidades_de_saude (nome, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:nome, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

            $sql->bindValue(':nome', $this->getUnidade(), PDO::PARAM_STR);
            $sql->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

            $sql->execute();

            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function editar($id) {

        try {

            $sql = $this->db->prepare("UPDATE unidades_de_saude SET nome = :unidade, atualizado_em = :atualizado_em WHERE id_unidade_de_saude = :id");
            $sql->bindValue(':unidade', $this->getUnidade(), PDO::PARAM_STR);
            $sql->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $sql->execute();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluir($id) {

        try {

            $sql = $this->db->prepare("DELETE FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function listaTodasUnidades() {


        $sql = $this->db->prepare("SELECT * FROM unidades_de_saude");
        $sql->execute();

        $unidades = $sql->fetchAll();

        if (!empty($unidades) || !is_null($unidades)) {

            return $unidades;
        }
    }

    public function buscaUnidadeParaEdicao($id) {

        $sql = $this->db->prepare("SELECT * FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $unidade = $sql->fetchObject();

        return $unidade;
    }

    public function buscaUnidadeParaExclusao($id) {

        $sql = $this->db->prepare("SELECT * FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $unidade = $sql->fetchObject();

        return $unidade;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

}
