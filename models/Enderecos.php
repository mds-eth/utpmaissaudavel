<?php

class Enderecos extends model {

    private $cep;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $numero;
    private $complemento;
    private $fkIdPessoa;

    public function gravar() {

        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];
    }

    public function Enderecos($cep, $rua, $bairro, $cidade, $estado, $numero, $complemento, $fkIdPessoa) {

        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->fkIdPessoa = $fkIdPessoa;
    }

    function getFkIdPessoa() {
        return $this->fkIdPessoa;
    }

    function setFkIdPessoa($fkIdPessoa) {
        $this->fkIdPessoa = $fkIdPessoa;
    }

    function getCep() {
        return $this->cep;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

}
