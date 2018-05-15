<?php

class Perfis extends Model {

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

        $idUsuario = $_SESSION['usuario']['id_usuario'];
        $date = date('d-m-Y H:i');

        $sql = $this->db->prepare("SELECT nome_perfil FROM perfis as p WHERE p.nome_perfil = :nome");
        $sql->bindValue(':nome', $this->getPerfil(), PDO::PARAM_STR);

        $sql->execute();

        $retorno = $sql->fetchObject();

        if (!is_null($retorno) || !empty($retorno)) {

            $sql = $this->db->prepare("INSERT INTO utpmaissaudavel.perfis (nome, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:nome, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

            $sql->bindValue(':nome', $this->getPerfil(), PDO::PARAM_STR);
            $sql->bindValue(':criado_por', $idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':criado_em', $date, PDO::PARAM_STR);

            return true;
        } else {
            return false;
        }
    }

    public function verificaAcessoUrl() {
        
        return true;

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
