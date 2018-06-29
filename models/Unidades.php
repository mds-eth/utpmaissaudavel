<?php

class Unidades extends model {

    private $log;
    private $unidade;
    private $regional;
    private $responsavel;
    private $fkIdRegional;

    public function __construct() {
        parent::__construct();
        $this->log = new Logs();
    }

    public function gravar() {

        try {

            $sql = $this->db->prepare("INSERT INTO unidades_de_saude (fk_id_regional, nome_unidade, unidade_criado_por, unidade_criado_em, unidade_atualizado_por, unidade_atualizado_em)
                VALUES (:fk_id_regional, :nome_unidade, :unidade_criado_por, :unidade_criado_em, :unidade_atualizado_por, :unidade_atualizado_em)");

            $sql->bindValue(':fk_id_regional', $this->getFkIdRegional(), PDO::PARAM_INT);
            $sql->bindValue(':nome_unidade', $this->getUnidade(), PDO::PARAM_STR);
            $sql->bindValue(':unidade_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':unidade_criado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':unidade_atualizado_por', $this->idUsuario, PDO::PARAM_STR);
            $sql->bindValue(':unidade_atualizado_em', $this->date, PDO::PARAM_STR);

            $sql->execute();

            return true;
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function editar($id) {

        try {

            $sql = $this->db->prepare("UPDATE unidades_de_saude SET nome_unidade = :unidade, unidade_atualizado_em = :unidade_atualizado_em WHERE id_unidade_de_saude = :id");
            $sql->bindValue(':unidade', $this->getUnidade(), PDO::PARAM_STR);
            $sql->bindValue(':unidade_atualizado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':id', $id, PDO::PARAM_INT);

            $sql->execute();
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function excluir($id) {

        try {

            $sql = $this->db->prepare("DELETE FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
            $sql->bindValue(':id', $id, PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function listaTodasUnidades() {


        $sql = $this->db->prepare("SELECT * FROM regionais r
                      JOIN unidades_de_saude us ON r.id_regional = us.fk_id_regional");
        $sql->execute();

        $unidades = $sql->fetchAll();

        if (!empty($unidades) || !is_null($unidades)) {

            return $unidades;
        }
    }

    public function buscaUnidadeParaEdicao($id) {

        $sql = $this->db->prepare("SELECT * FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $unidade = $sql->fetchObject();

        return $unidade;
    }

    public function buscaUnidadeParaExclusao($id) {

        $sql = $this->db->prepare("SELECT * FROM unidades_de_saude WHERE id_unidade_de_saude = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $unidade = $sql->fetchObject();

        return $unidade;
    }

    public function cadastrarRegional() {

        try {

            $sql = $this->db->prepare("INSERT INTO regionais(nome_regional, responsavel_regional, regional_criado_por,
                regional_criado_em, regional_atualizado_por, regional_atualizado_em)
                VALUES(:nome_regional, :responsavel_regional, :regional_criado_por,
                :regional_criado_em, :regional_atualizado_por, :regional_atualizado_em)");

            $sql->bindValue(':nome_regional', $this->getRegional(), PDO::PARAM_STR);
            $sql->bindValue(':responsavel_regional', $this->getResponsavel(), PDO::PARAM_STR);
            $sql->bindValue(':regional_criado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':regional_criado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':regional_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':regional_atualizado_em', $this->date, PDO::PARAM_STR);

            $sql->execute();

            return true;
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function listaRegionais() {

        $sql = $this->db->prepare("SELECT * FROM regionais");
        $sql->execute();

        $regionais = $sql->fetchAll();

        if (!empty($regionais)) {
            return $regionais;
        }
    }

    public function buscaRegionalParaEdicao($id) {


        $sql = $this->db->prepare("SELECT * FROM regionais r WHERE r.id_regional = :id");
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $regional = $sql->fetchObject();

        if (!empty($regional)) {
            return $regional;
        }
    }

    public function editarRegional() {

        try {

            $sql = $this->db->prepare("UPDATE regionais SET nome_regional = :nome_regional, 
                    responsavel_regional = :responsavel_regional,
                    regional_atualizado_por = :regional_atualizado_por, regional_atualizado_em = :regional_atualizado_em
                    WHERE id_regional = :id");

            $sql->bindValue(':nome_regional', $this->getRegional(), PDO::PARAM_STR);
            $sql->bindValue(':responsavel_regional', $this->getResponsavel());
            $sql->bindValue(':regional_atualizado_por', $this->idUsuario, PDO::PARAM_INT);
            $sql->bindValue(':regional_atualizado_em', $this->date, PDO::PARAM_STR);
            $sql->bindValue(':id', $this->getFkIdRegional());
            $retorno = $sql->execute();

            if ($retorno) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    function getUnidade() {
        return $this->unidade;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    function getRegional() {
        return $this->regional;
    }

    function getResponsavel() {
        return $this->responsavel;
    }

    function setRegional($regional) {
        $this->regional = $regional;
    }

    function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    function getFkIdRegional() {
        return $this->fkIdRegional;
    }

    function setFkIdRegional($fkIdRegional) {
        $this->fkIdRegional = $fkIdRegional;
    }

}
