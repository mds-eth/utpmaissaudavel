<?php

class Telefones extends model {

    private $residencial;
    private $celular;
    private $contato;
    private $fkIdPessoa;

    public function gravar() {

        $date = date("Y-m-d H-i-s");
        $celular = $this->getCelular();
        $contato = $this->getContato();
        $fkIdPessoa = $this->getFkIdPessoa();
        $residencial = $this->getResidencial();
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO telefones(fk_id_pessoa, telefone, celular, contato, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:fk_id_pessoa, 
                :telefone, :celular, :contato, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $fkIdPessoa, PDO::PARAM_STR);
            $pdo->bindValue(':telefone', $residencial, PDO::PARAM_STR);
            $pdo->bindValue(':celular', $celular, PDO::PARAM_STR);
            $pdo->bindValue(':contato', $contato, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function editar($id) {
        
    }

    public function excluir($id) {
        
    }

    public function Telefones($residencial, $celular, $contato, $fkIdPessoa) {

        $this->residencial = $residencial;
        $this->celular = $celular;
        $this->contato = $contato;
        $this->fkIdPessoa = $fkIdPessoa;
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
