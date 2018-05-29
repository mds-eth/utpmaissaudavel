<?php

class Pessoas extends model {

    private $rg;
    private $cpf;
    private $sexo;
    private $nome;
    private $email;
    private $dataNascimento;

    public function gravar() {

        $status = 1;

        try {

            $sql = "INSERT INTO pessoas(nome_pessoa, data_nascimento, sexo, cpf, rg, email,
                 status, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:nome_pessoa, 
                :data_nascimento, :sexo, :cpf, :rg, :email,
                :status, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':nome_pessoa', $this->getNome(), PDO::PARAM_STR);
            $pdo->bindValue(':data_nascimento', $this->getDataNascimento(), PDO::PARAM_STR);
            $pdo->bindValue(':sexo', $this->getSexo(), PDO::PARAM_STR);
            $pdo->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $pdo->bindValue(':rg', $this->getRg(), PDO::PARAM_STR);
            $pdo->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $pdo->bindValue(':status', $status, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();

            $fkIdPessoa = $this->db->lastInsertId();

            return $fkIdPessoa;
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function atualizar($idPessoa) {

        try {

            $sql = "UPDATE pessoas SET nome_pessoa = :nome_pessoa, data_nascimento = :data_nascimento, cpf = :cpf, rg = :rg, email = :email, 
                    atualizado_por = :atualizado_por, atualizado_em = :atualizado_em WHERE id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':nome_pessoa', $this->getNome(), PDO::PARAM_STR);
            $pdo->bindValue(':data_nascimento', $this->getDataNascimento(), PDO::PARAM_STR);
            $pdo->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $pdo->bindValue(':rg', $this->getRg(), PDO::PARAM_STR);
            $pdo->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $idPessoa, PDO::PARAM_INT);


            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function excluir($idPessoa) {

        $status = 0;

        try {

            $sql = "UPDATE pessoas SET status = :status, atualizado_por = :atualizado_por, atualizado_em = :atualizado_em WHERE id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':status', $status, PDO::PARAM_BOOL);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $idPessoa, PDO::PARAM_INT);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
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

    public function buscaRegistroPessoaExclusao($id) {

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
                        join perfis pe on u.fk_id_perfil = pe.id_perfil
                        and p.status = 1");

        $sql->execute();

        $return = $sql->fetchAll();

        if ($return != null || !empty($return)) {

            return $return;
        }
    }

    function getNome() {
        return $this->nome;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
