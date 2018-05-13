<?php

class Usuarios extends Model {

    private $nome;
    private $dataNascimento;
    private $sexo;
    private $cpf;
    private $rg;
    private $email;
    private $formacao;
    private $status;
    private $matricula;
    private $criadoPor;
    private $criadoEm;
    private $atualizadoPor;
    private $atualizadoEm;

    public function save() {

        try {

            $sql = "INSERT INTO utpmaissaudavel.pessoas(nome_pessoa, data_nascimento, sexo, cpf, rg, email,
                formacao, status, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:nome_pessoa, :data_nascimento, :sexo, :cpf, :rg, :email,
                :formacao, :status, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

                       
            $pdo->bindValue('?', $this->getNome(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getDataNascimento(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getSexo(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getCpf(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getRg(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getEmail(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getFormacao(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getStatus(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getCriadoPor(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getAtualizadoPor(), PDO::PARAM_STR);
            $pdo->bindValue('?', $this->getAtualizadoEm(), PDO::PARAM_STR);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
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

    function getFormacao() {
        return $this->formacao;
    }

    function getStatus() {
        return $this->status;
    }

    function getMatricula() {
        return $this->matricula;
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

    function setFormacao($formacao) {
        $this->formacao = $formacao;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
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
