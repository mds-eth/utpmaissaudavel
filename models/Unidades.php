<?php

class Unidades extends model {

    private $unidade;

    public function gravar() {

        try {

            $date = date("Y-m-d H-i-s");
            $unidade = $this->getUnidade();
            $idUsuario = $_SESSION['usuario']['id_usuario'];

            $sql = $this->db->prepare("INSERT INTO unidades_de_saude (nome, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:nome, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

            $sql->bindValue(':nome', $unidade, PDO::PARAM_STR);
            $sql->bindValue(':criado_por', $idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $sql->execute();

            return true;
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

    function getUnidade() {
        return $this->unidade;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

}
