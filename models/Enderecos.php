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

        $cep = $this->getCep();
        $rua = $this->getRua();
        $date = date("Y-m-d H-i-s");
        $cidade = $this->getCidade();
        $bairro = $this->getBairro();
        $estado = $this->getEstado();
        $numero = $this->getNumero();
        $fkIdPessoa = $this->getFkIdPessoa();
        $complemento = $this->getComplemento();
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO enderecos(fk_id_pessoa, cep, rua, bairro, cidade, estado, numero, complemento,
                 criado_por, criado_em, atualizado_por, atualizado_em) 
                 VALUES(:fk_id_pessoa, :cep, :rua, :bairro, :cidade, :estado, :numero, :complemento
                :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $fkIdPessoa, PDO::PARAM_STR);
            $pdo->bindValue(':cep', $cep, PDO::PARAM_STR);
            $pdo->bindValue(':rua', $rua, PDO::PARAM_STR);
            $pdo->bindValue(':bairro', $bairro, PDO::PARAM_STR);
            $pdo->bindValue(':cidade', $cidade, PDO::PARAM_STR);
            $pdo->bindValue(':estado', $estado, PDO::PARAM_STR);
            $pdo->bindValue(':numero', $numero, PDO::PARAM_STR);
            $pdo->bindValue(':complemento', $complemento, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
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
