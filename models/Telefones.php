<?php

class Telefones extends model {

    private $residencial;
    private $celular;
    private $contato;
    private $fkIdPessoa;

    public function gravar() {

        try {

            $sql = "INSERT INTO telefones(fk_id_pessoa, telefone, celular, contato, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:fk_id_pessoa, 
                :telefone, :celular, :contato, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $this->getFkIdPessoa(), PDO::PARAM_INT);
            $pdo->bindValue(':telefone', $this->getResidencial(), PDO::PARAM_STR);
            $pdo->bindValue(':celular', $this->getCelular(), PDO::PARAM_STR);
            $pdo->bindValue(':contato', $this->getContato(), PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function atualizar($idPessoa) {

        try {

            $sql = "UPDATE telefones SET telefone = :residencial, celular = :celular, contato = :contato WHERE fk_id_pessoa = :id_pessoa";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':residencial', $this->getResidencial(), PDO::PARAM_STR);
            $pdo->bindValue(':celular', $this->getCelular(), PDO::PARAM_STR);
            $pdo->bindValue(':contato', $this->getContato(), PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);
            $pdo->bindValue(':id_pessoa', $idPessoa, PDO::PARAM_INT);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
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
