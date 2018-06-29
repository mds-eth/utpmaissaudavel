<?php

class Telefones extends model {

    private $log;
    private $residencial;
    private $celular;
    private $contato;
    private $fkIdPessoa;

    public function __construct() {
        parent::__construct();
        $this->log = new Logs();
    }

    public function gravar() {

        try {

            $sql = "INSERT INTO telefones(
                    fk_id_pessoa, telefone, celular, contato, telefone_criado_por,
                    telefone_criado_em, telefone_atualizado_por, telefone_atualizado_em) 
                    VALUES(:fk_id_pessoa, :telefone, :celular, :contato, :telefone_criado_por, 
                    :telefone_criado_em, :telefone_atualizado_por, :telefone_atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);
            $pdo->bindValue(':telefone', $this->getResidencial(), PDO::PARAM_STR);
            $pdo->bindValue(':celular', $this->getCelular(), PDO::PARAM_STR);
            $pdo->bindValue(':contato', $this->getContato(), PDO::PARAM_STR);
            $pdo->bindValue(':telefone_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':telefone_criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':telefone_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':telefone_atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function atualizar() {

        try {

            $sql = "UPDATE telefones SET telefone = :residencial, celular = :celular, contato = :contato, telefone_atualizado_por = :telefone_atualizado_por,
                telefone_atualizado_em = :telefone_atualizado_em WHERE fk_id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':residencial', $this->getResidencial(), PDO::PARAM_STR);
            $pdo->bindValue(':celular', $this->getCelular(), PDO::PARAM_STR);
            $pdo->bindValue(':contato', $this->getContato(), PDO::PARAM_STR);
            $pdo->bindValue(':telefone_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':telefone_atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);

            $pdo->execute();
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    function getResidencial() {
        return $this->residencial;
    }

    function getCelular() {
        return $this->celular;
    }

    function getContato() {
        return $this->contato;
    }

    function getFkIdPessoa() {
        return $this->fkIdPessoa;
    }

    function setResidencial($residencial) {
        $this->residencial = $residencial;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setContato($contato) {
        $this->contato = $contato;
    }

    function setFkIdPessoa($fkIdPessoa) {
        $this->fkIdPessoa = $fkIdPessoa;
    }

}
