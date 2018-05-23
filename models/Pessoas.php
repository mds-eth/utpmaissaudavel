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
        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO pessoas(nome_pessoa, data_nascimento, sexo, cpf, rg, email,
                 status, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:nome_pessoa, 
                :data_nascimento, :sexo, :cpf, :rg, :email,
                :status, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";


            $sql->bindValue(':nome_pessoa', $this->getNome(), PDO::PARAM_STR);
            $sql->bindValue(':data_nascimento', $this->getDataNascimento(), PDO::PARAM_STR);
            $sql->bindValue(':sexo', $this->getSexo(), PDO::PARAM_STR);
            $sql->bindValue(':cpf', $this->getCpf(), PDO::PARAM_STR);
            $sql->bindValue(':rg', $this->getRg(), PDO::PARAM_STR);
            $sql->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sql->bindValue(':status', $status, PDO::PARAM_STR);
            $sql->bindValue(':criado_por', $idUsuario, PDO::PARAM_STR);
            $sql->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $sql->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $sql->execute();

            $fkIdPessoa = $this->db->lastInsertId();

            return $fkIdPessoa;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function validaLogin($email, $senha) {

        $sql = $this->db->prepare("SELECT u.id_usuario, p.id_pessoa, p.nome_pessoa, p.email, 
                            pe.nome_perfil, pe.id_perfil FROM usuarios AS u
                            JOIN pessoas AS p on u.fk_id_pessoa = p.id_pessoa
                            JOIN perfis AS pe on u.id_usuario = pe.id_perfil
                            AND p.email = :email
                            AND u.senha = :senha");

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

    public function listaTodos() {
        
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
