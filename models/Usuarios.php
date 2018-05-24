<?php

class Usuarios extends model {

    private $fkIdPerfil;
    private $fkIdPessoa;

    public function gravar() {

        $date = date("Y-m-d H-i-s");
        $fkIdPerfil = $this->getFkIdPerfil();
        $fkIdPessoa = $this->getFkIdPessoa();
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO usuarios(fk_id_perfil, fk_id_pessoa, senha, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:fk_id_perfil, 
                :fk_id_pessoa, :senha, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_perfil', $fkIdPerfil, PDO::PARAM_STR);
            $pdo->bindValue(':fk_id_pessoa', $fkIdPessoa, PDO::PARAM_STR);
            $pdo->bindValue(':senha', null, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function Usuarios($fkIdPerfil, $fkIdPessoa) {

        $this->fkIdPerfil = $fkIdPerfil;
        $this->fkIdPessoa = $fkIdPessoa;
    }

    function getFkIdPerfil() {
        return $this->fkIdPerfil;
    }

    function getFkIdPessoa() {
        return $this->fkIdPessoa;
    }

    function setFkIdPerfil($fkIdPerfil) {
        $this->fkIdPerfil = $fkIdPerfil;
    }

    function setFkIdPessoa($fkIdPessoa) {
        $this->fkIdPessoa = $fkIdPessoa;
    }

}
