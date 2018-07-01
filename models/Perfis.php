<?php

class Perfis extends Model {

    CONST ADMINISTRADOR = 1;
    CONST COORDENADOR = 2;
    CONST FISIOTERAPEUTA = 3;
    CONST SECRETARIA = 4;
    CONST ALUNO = 5;
    CONST PACIENTE = 6;
    CONST MEDICO = 7;

    private $log;
    private $url;
    private $perfil;

    public function __construct() {
        parent::__construct();
        $this->log = new Logs();
    }

    public function gravaPerfil() {

        $validaPerfil = $this->validaPerfil();

        if (!$validaPerfil) {

            try {

                $sql = $this->db->prepare("INSERT INTO perfis (nome_perfil, perfil_criado_por, perfil_criado_em, perfil_atualizado_por, perfil_atualizado_em)
                VALUES (:nome_perfil, :perfil_criado_por, :perfil_criado_em, :perfil_atualizado_por, :perfil_atualizado_em)");

                $sql->bindValue(':nome_perfil', $this->getPerfil(), PDO::PARAM_STR);
                $sql->bindValue(':perfil_criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':perfil_criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':perfil_atualizado_por', $this->idUsuario, PDO::PARAM_STR);
                $sql->bindValue(':perfil_atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();

                return true;
            } catch (Exception $exc) {
                $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
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

        if ($_SESSION['usuario']['id_perfil'] != 1) {
            $sql = $this->db->prepare("SELECT * FROM perfis WHERE nome_perfil != 'Administrador'");
        } else {
            $sql = $this->db->prepare("SELECT * FROM perfis");
        }

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
