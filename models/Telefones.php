<?php

class Telefones extends model {

    private $residencial;
    private $celular;
    private $contato;
    private $fkIdPessoa;

    public function gravar() {

        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];
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
