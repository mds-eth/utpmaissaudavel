<?php

class Login extends model {

    private $id;
    private $email;
    private $senha;

    public function validaLogin() {

        $sql = $this->db->prepare("SELECT id_usuario, fk_id_perfil, fk_id_pessoa, senha, id_pessoa, nome_pessoa, email, status, id_perfil, nome_perfil
                            FROM usuarios u JOIN pessoas p ON u.fk_id_pessoa = p.id_pessoa
                            JOIN perfis pe ON u.fk_id_perfil = pe.id_perfil
                            AND p.email = :email
                            AND u.senha = :senha");

        $sql->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $sql->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
        $sql->execute();

        $pessoa = $sql->fetchObject();

        if ($pessoa != null || !empty($pessoa)) {

            if ($pessoa->status == 0) {
                return 0;
            } else if ($pessoa->senha == $this->getEmail()) {
                $dados['id_pessoa'] = $pessoa->id_usuario;
                $dados['email'] = $pessoa->email;
                $dados['nome_pessoa'] = $pessoa->nome_pessoa;
                $_SESSION['temp'] = $dados;
                return 1;
            } else {
                $dados['id_usuario'] = $pessoa->id_usuario;
                $dados['id_pessoa'] = $pessoa->id_pessoa;
                $dados['nome_pessoa'] = $pessoa->nome_pessoa;
                $dados['email'] = $pessoa->email;
                $dados['status'] = $pessoa->status;
                $dados['perfil'] = $pessoa->nome_perfil;
                $dados['id_perfil'] = $pessoa->id_perfil;
                $_SESSION['usuario'] = $dados;
                return true;
            }
        } else {
            return false;
        }
    }

    public function gravaSenhaPrimeiroAcessoUsuario() {

        try {

            $sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE id_usuario = :id");
            $sql->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
            $sql->bindValue(':id', $this->getId(), PDO::PARAM_INT);

            $return = $sql->execute();

            if ($return) {
                $this->criaSessaoUsuarioNovo();
                return true;
            }
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function criaSessaoUsuarioNovo() {

        $this->setEmail($_SESSION['temp']['email']);

        $sql = $this->db->prepare("SELECT id_usuario, fk_id_perfil, fk_id_pessoa, senha, id_pessoa, nome_pessoa, email, status, id_perfil, nome_perfil
                            FROM usuarios u JOIN pessoas p ON u.fk_id_pessoa = p.id_pessoa
                            JOIN perfis pe ON u.fk_id_perfil = pe.id_perfil
                            AND p.email = :email
                            AND u.senha = :senha");

        $sql->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $sql->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
        $sql->execute();

        $pessoa = $sql->fetchObject();

        if ($pessoa != null || !empty($pessoa)) {

            $dados['id_usuario'] = $pessoa->id_usuario;
            $dados['id_pessoa'] = $pessoa->id_pessoa;
            $dados['nome_pessoa'] = $pessoa->nome_pessoa;
            $dados['email'] = $pessoa->email;
            $dados['status'] = $pessoa->status;
            $dados['perfil'] = $pessoa->nome_perfil;
            $dados['id_perfil'] = $pessoa->id_perfil;
            $_SESSION['usuario'] = $dados;
        }
        $this->destroiSessaoTemporaria();
    }

    public function destroiSessaoTemporaria() {

        unset($_SESSION['temp']);
        session_destroy();

        return true;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

}
