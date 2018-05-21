<?php

class Perfis extends model {

    CONST ADMINISTRADOR = 1;
    CONST COORDENADOR = 2;
    CONST FISIOTERAPEUTA = 3;
    CONST SECRETARIA = 4;
    CONST ALUNO = 5;
    CONST PACIENTE = 6;
    CONST MEDICO = 7;

    private $perfil;
    private $url;

    public function gravaPerfil() {

        $validaPerfil = $this->validaPerfil();

        if (!$validaPerfil) {

            try {

                $idUsuario = $_SESSION['usuario']['id_usuario'];
                $date = date("Y-m-d H-i-s");

                $sql = $this->db->prepare("INSERT INTO perfis (nome_perfil, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:nome_perfil, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

                $sql->bindValue(':nome_perfil', $this->getPerfil(), PDO::PARAM_STR);
                $sql->bindValue(':criado_por', $idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':criado_em', $date, PDO::PARAM_STR);
                $sql->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
                $sql->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

                $sql->execute();

                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            return false;
        }
    }

    public function validaPerfil() {

        $sql = $this->db->prepare("SELECT nome_perfil FROM perfis AS p WHERE p.nome_perfil = :perfil");
        $sql->bindValue(':perfil', $this->getPerfil(), PDO::PARAM_STR);
        $sql->execute();

        $retorno = $sql->fetchObject();

        if ($retorno) {
            return true;
        } else {
            return false;
        }
    }

    public function buscaPerfis() {

        $sql = $this->db->prepare("SELECT * FROM perfis");
        $sql->execute();

        $retorno = $sql->fetchAll();

        return $retorno;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }

}
