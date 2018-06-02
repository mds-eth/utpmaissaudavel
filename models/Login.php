<?php

class Login extends model {

    private $email;
    private $senha;

    public function validaLogin() {

        $sql = $this->db->prepare("select * from usuarios u join pessoas p on u.fk_id_pessoa = p.id_pessoa
                    join perfis pe on u.fk_id_perfil = pe.id_perfil
                    and p.email = :email
                    and u.senha = :senha");

        $sql->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $sql->bindValue(':senha', $this->getSenha(), PDO::PARAM_STR);
        $sql->execute();

        $return = $sql->fetchObject();

        if ($return != null || !empty($return)) {
            $dados['id_usuario'] = $return->id_usuario;
            $dados['id_pessoa'] = $return->id_pessoa;
            $dados['nome_pessoa'] = $return->nome_pessoa;
            $dados['email'] = $return->email;
            $dados['perfil'] = $return->nome_perfil;
            $dados['id_perfil'] = $return->id_perfil;
            $_SESSION['usuario'] = $dados;
            return true;
        } else {
            return false;
        }
    }

    public function geraNovaSenhaUsuarioPrimeiroAcesso() {
        
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
