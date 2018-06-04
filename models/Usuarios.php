<?php

class Usuarios extends model {

    private $fkIdPerfil;
    private $fkIdPessoa;

    public function gravar() {

        try {

            $sql = "INSERT INTO usuarios(fk_id_perfil, fk_id_pessoa, senha, usuario_criado_por, usuario_criado_em, 
                usuario_atualizado_por, usuario_atualizado_em) VALUES(:fk_id_perfil, 
                :fk_id_pessoa, :senha, :usuario_criado_por, :usuario_criado_em, :usuario_atualizado_por, :usuario_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_perfil', $this->getFkIdPerfil(), PDO::PARAM_INT);
            $pdo->bindValue(':fk_id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);
            $pdo->bindValue(':senha', null, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_criado_por', $this->idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_atualizado_por', $this->idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function logado() {

        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
            return true;
        } else {
            return false;
        }
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
