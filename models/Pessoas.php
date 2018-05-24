<?php

class Pessoas extends model {

    private $nome;
    private $dataNascimento;
    private $sexo;
    private $cpf;
    private $rg;
    private $email;
    private $status;
    private $criadoPor;
    private $criadoEm;
    private $atualizadoPor;
    private $atualizadoEm;

    public function gravar() {

        $status = 1;
        $rg = $this->getRg();
        $cpf = $this->getCpf();
        $sexo = $this->getSexo();
        $email = $this->getEmail();
        $date = date("Y-m-d H-i-s");
        $nomePessoa = $this->getNome();
        $dataNascimento = $this->getDataNascimento();
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

        $sql = $this->db->prepare("select * from usuarios u join pessoas p on u.id_usuario = p.id_pessoa
                    join perfis as pe on u.fk_id_perfil = pe.id_perfil
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

    public function update() {
        
    }

    public function delete() {
        
    }

    public function listaTodosUsuarios() {

        $sql = $this->db->prepare("SELECT * FROM pessoas p JOIN usuarios u ON p.id");
    }

    public function listaUnicoUsuario($id) {
        
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

    function getStatus() {
        return $this->status;
    }

    function getCriadoPor() {
        return $this->criadoPor;
    }

    function getCriadoEm() {
        return $this->criadoEm;
    }

    function getAtualizadoPor() {
        return $this->atualizadoPor;
    }

    function getAtualizadoEm() {
        return $this->atualizadoEm;
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

    function setStatus($status) {
        $this->status = $status;
    }

    function setCriadoPor($criadoPor) {
        $this->criadoPor = $criadoPor;
    }

    function setCriadoEm($criadoEm) {
        $this->criadoEm = $criadoEm;
    }

    function setAtualizadoPor($atualizadoPor) {
        $this->atualizadoPor = $atualizadoPor;
    }

    function setAtualizadoEm($atualizadoEm) {
        $this->atualizadoEm = $atualizadoEm;
    }

}
