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

    public function gravaPerfil() {

        $idUsuario = $_SESSION['usuario']['id_usuario'];

        $sql = $this->db->prepare("SELECT nome_perfil FROM perfis as p WHERE p.nome_perfil = :nome");
        $sql->bindValue(':nome', $this->getPerfil(), PDO::PARAM_STR);

        $sql->execute();

        $retorno = $sql->fetchObject();

        var_dump($retorno);
        die('retorno do banco');

        if (!is_null($this->getPerfil())) {

            $sql = $this->db->prepare("INSERT INTO utpmaissaudavel.perfis (nome, criado_por, criado_em, atualizado_por, atualizado_em) 
                VALUES (:nome, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

            try {
                
            } catch (Exception $exc) {
                echo $exc->getMessage();
            }
        }
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

}
