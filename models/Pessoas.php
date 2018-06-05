<?php

class Pessoas extends model {

    public $rg;
    public $cpf;
    public $sexo;
    public $mae;
    public $nome;
    public $email;
    public $dataNascimento;

    public function gravar() {

        $status = 1;

        try {

            $sql = "INSERT INTO pessoas(nome_pessoa, data_nascimento, sexo, cpf, rg, email,
                 status, pessoa_criado_por, pessoa_criado_em, pessoa_atualizado_por, pessoa_atualizado_em) VALUES(:nome_pessoa, 
                :data_nascimento, :sexo, :cpf, :rg, :email,
                :status, :pessoa_criado_por, :pessoa_criado_em, :pessoa_atualizado_por, :pessoa_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':nome_pessoa', $this->getNome(), PDO::PARAM_STR);
            $pdo->bindValue(':data_nascimento', $this->getDataNascimento(), PDO::PARAM_STR);
            $pdo->bindValue(':sexo', $this->getSexo(), PDO::PARAM_STR);
            $pdo->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $pdo->bindValue(':rg', $this->getRg(), PDO::PARAM_STR);
            $pdo->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $pdo->bindValue(':status', $status, PDO::PARAM_STR);
            $pdo->bindValue(':pessoa_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':pessoa_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':pessoa_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':pessoa_atualizado_em', $this->date, PDO::PARAM_STR);

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
                    pessoa_atualizado_por = :pessoa_atualizado_por, pessoa_atualizado_em = :pessoa_atualizado_em WHERE id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':nome_pessoa', $this->getNome(), PDO::PARAM_STR);
            $pdo->bindValue(':data_nascimento', $this->getDataNascimento(), PDO::PARAM_STR);
            $pdo->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $pdo->bindValue(':rg', $this->getRg(), PDO::PARAM_STR);
            $pdo->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $pdo->bindValue(':pessoa_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':pessoa_atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $idPessoa, PDO::PARAM_INT);


            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function excluir($idPessoa) {

        $status = 0;

        try {

            $sql = "UPDATE pessoas SET status = :status, pessoa_atualizado_por = :pessoa_atualizado_por, pessoa_atualizado_em = :pessoa_atualizado_em WHERE id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':status', $status, PDO::PARAM_BOOL);
            $pdo->bindValue(':pessoa_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':pessoa_atualizado_em', $this->date, PDO::PARAM_STR);
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

        return $retorno != false ? true : false;
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

    public function listaPessoasAtivas() {

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

    public function listaPessoasInativas() {

        $sql = $this->db->prepare("select * from pessoas p join usuarios u on p.id_pessoa = u.fk_id_pessoa
                        join enderecos e on p.id_pessoa = e.fk_id_pessoa
                        join telefones t on p.id_pessoa = t.fk_id_pessoa
                        join perfis pe on u.fk_id_perfil = pe.id_perfil
                        and p.status = 0");

        $sql->execute();

        $return = $sql->fetchAll();

        if ($return != null || !empty($return)) {

            return $return;
        }
    }

    public function buscaPessoaParaReativar($id) {

        $sql = $this->db->prepare("SELECT id_pessoa, nome_pessoa FROM pessoas WHERE id_pessoa = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $pessoa = $sql->fetchObject();

        return $pessoa;
    }

    public function reativarPessoa($id) {

        try {

            $sql = $this->db->prepare("UPDATE pessoas SET status = :status WHERE id_pessoa = :id");
            $sql->bindValue(':status', 1, PDO::PARAM_INT);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $sql->execute();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function listaPerfilPessoa($id) {

        $sql = $this->db->prepare("SELECT * FROM pessoas p 
                        JOIN enderecos e ON p.id_pessoa = e.fk_id_pessoa 
                        JOIN telefones t ON p.id_pessoa = t.fk_id_pessoa 
                        JOIN usuarios as u ON p.id_pessoa = u.fk_id_pessoa
                        JOIN perfis pe ON u.fk_id_perfil = pe.id_perfil
                        AND p.id_pessoa = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $pessoa = $sql->fetchObject();

        return $pessoa;
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

    function getMae() {
        return $this->mae;
    }

    function setMae($mae) {
        $this->mae = $mae;
    }

}
