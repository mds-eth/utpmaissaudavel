<?php

class Pessoas extends model {

    public function gravar($nomePessoa, $dataNascimento, $sexo, $cpf, $rg, $email) {

        $status = 1;
        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO pessoas(nome_pessoa, data_nascimento, sexo, cpf, rg, email,
                 status, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:nome_pessoa, 
                :data_nascimento, :sexo, :cpf, :rg, :email,
                :status, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':nome_pessoa', $nomePessoa, PDO::PARAM_STR);
            $pdo->bindValue(':data_nascimento', $dataNascimento, PDO::PARAM_STR);
            $pdo->bindValue(':sexo', $sexo, PDO::PARAM_STR);
            $pdo->bindValue(':cpf', $cpf, PDO::PARAM_STR);
            $pdo->bindValue(':rg', $rg, PDO::PARAM_STR);
            $pdo->bindValue(':email', $email, PDO::PARAM_STR);
            $pdo->bindValue(':status', $status, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $pdo->execute();

            $fkIdPessoa = $this->db->lastInsertId();

            return $fkIdPessoa;
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function validaLogin($email, $senha) {

        $sql = $this->db->prepare("select * from usuarios u join pessoas p on u.fk_id_pessoa = p.id_pessoa
                    join perfis pe on u.fk_id_perfil = pe.id_perfil
                    and p.email = :email
                    and u.senha = :senha");

        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->bindValue(':senha', $senha, PDO::PARAM_STR);

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

            return true;
        } else {
            return false;
        }
    }

    public function validaCpf($cpf) {

        $sql = $this->db->prepare("SELECT cpf FROM pessoas AS p WHERE p.cpf = :cpf");
        $sql->bindValue(':cpf', $cpf, PDO::PARAM_STR);

        $sql->execute();

        $retorno = $sql->fetchObject();

        if (empty($retorno)) {
            return true;
        } else {
            return false;
        }
    }

    public function logado() {

        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
            return true;
        } else {
            return false;
        }
    }

    public function buscaRegistroPessoaEdicao($id) {

        $sql = $this->db->prepare("select id_pessoa, nome_pessoa, data_nascimento, sexo, 
                        cpf, rg, email, id_telefone, telefone, celular, contato, id_endereco, 
                        cep, rua, bairro, cidade, estado, numero, complemento
                        from pessoas p join enderecos e on p.id_pessoa = e.fk_id_pessoa
                        join telefones t on p.id_pessoa = t.fk_id_pessoa
                        and id_pessoa = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);

        $sql->execute();

        $retorno = $sql->fetchAll();

        if ($retorno != null || !empty($retorno)) {
            return $retorno;
        }
    }

    public function listaTodosUsuarios() {

        $sql = $this->db->prepare("select * from pessoas p join usuarios u on p.id_pessoa = u.fk_id_pessoa
                        join enderecos e on p.id_pessoa = e.fk_id_pessoa
                        join telefones t on p.id_pessoa = t.fk_id_pessoa
                        join perfis pe on u.fk_id_perfil = pe.id_perfil");

        $sql->execute();

        $return = $sql->fetchAll();

        if ($return != null || !empty($return)) {

            return $return;
        }
    }

    public function listaUnicoUsuario($id) {
        
    }

}
