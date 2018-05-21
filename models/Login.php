<?php

class Login extends Model {

    private $email;
    private $senha;

    public function logar() {

        $dados = array();

        try {

            if (!empty($this->getEmail() && !empty($this->getSenha()))) {

                $sql = $this->db->prepare("SELECT u.id_usuario, p.id_pessoa, p.nome_pessoa, p.email, 
                            pe.nome_perfil, pe.id_perfil FROM usuarios AS u
                            JOIN pessoas AS p on u.fk_id_pessoa = p.id_pessoa
                            JOIN perfis AS pe on u.id_usuario = pe.id_perfil
                            AND p.email = :email
                            AND u.senha = :senha");

                $sql->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
                $sql->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);

                $sql->execute();

                $return = $sql->fetchObject();

                if ($return != null) {

                    $dados['id_usuario'] = $return->id_usuario;
                    $dados['id_pessoa'] = $return->id_pessoa;
                    $dados['nome_pessoa'] = $return->nome_pessoa;
                    $dados['email'] = $return->email;
                    $dados['perfil'] = $return->nome_perfil;
                    $dados['id_perfil'] = $return->id_perfil;

                    $_SESSION['usuario'] = $dados;
                } else {
                    return false;
                }
            }
        } catch (Exception $ex) {
            return false;
        }
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

}
