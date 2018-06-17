<?php

class Usuarios extends model {

    private $fkIdPerfil;
    private $fkIdPessoa;

    public function gravar($email) {

        try {

            $sql = "INSERT INTO usuarios(fk_id_perfil, fk_id_pessoa, senha, usuario_criado_por, usuario_criado_em, 
                usuario_atualizado_por, usuario_atualizado_em) VALUES(:fk_id_perfil, 
                :fk_id_pessoa, :senha, :usuario_criado_por, :usuario_criado_em, :usuario_atualizado_por, :usuario_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_perfil', $this->getFkIdPerfil(), PDO::PARAM_INT);
            $pdo->bindValue(':fk_id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);
            $pdo->bindValue(':senha', $email, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_criado_por', $this->idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_atualizado_por', $this->idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':usuario_atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function buscarAlunosParaRenderizarAgenda() {

        $sql = $this->db->prepare("SELECT id_pessoa, nome_pessoa, codigo, nome_perfil FROM pessoas p JOIN usuarios u
                            ON p.id_pessoa = u.fk_id_pessoa
                            JOIN perfis pe
                            ON u.fk_id_perfil = pe.id_perfil
                            AND p.status = 1
                            AND pe.id_perfil = 5");
        $sql->execute();

        return !empty($alunos = $sql->fetchAll()) ? $alunos : null;
    }

    public function logado() {

        return isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) ? true : false;
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
