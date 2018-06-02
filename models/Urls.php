<?php

class Urls extends model {

    public function cadastrar($url, $perfis) {

        $retornoValidaUrl = $this->validaUrl($url);

        if ($retornoValidaUrl) {

            try {

                $sql = $this->db->prepare("INSERT INTO urls (nome_url, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:nome_url, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

                $sql->bindValue(':nome_url', $url, PDO::PARAM_STR);
                $sql->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_STR);
                $sql->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();

                $fkIdUrl = $this->db->lastInsertId();
                $this->gravaTabelaFronteiraPerfisUrl($fkIdUrl, $perfis);

                return true;
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            return false;
        }
    }

    public function gravaTabelaFronteiraPerfisUrl($fkUrl, $perfis) {

        try {

            foreach ($perfis as $idPerfil) {

                $sql = $this->db->prepare("INSERT INTO perfis_url (fk_id_url, fk_id_perfil, criado_por, criado_em, atualizado_por, atualizado_em)
                VALUES (:fk_id_url, :fk_id_perfil, :criado_por, :criado_em, :atualizado_por, :atualizado_em)");

                $sql->bindValue(':fk_id_url', $fkUrl, PDO::PARAM_INT);
                $sql->bindValue(':fk_id_perfil', $idPerfil, PDO::PARAM_INT);
                $sql->bindValue(':criado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':criado_em', $this->date, PDO::PARAM_STR);
                $sql->bindValue(':atualizado_por', $this->idUsuario, PDO::PARAM_INT);
                $sql->bindValue(':atualizado_em', $this->date, PDO::PARAM_STR);

                $sql->execute();
            }

            return true;
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

    public function listaTodasUrls() {

        $sql = $this->db->prepare("SELECT * FROM perfis_url pu JOIN urls u ON pu.fk_id_url = u.id_url
                JOIN perfis p on pu.fk_id_perfil = p.id_perfil");

        $sql->execute();

        $urls = $sql->fetchAll();

        return $urls;
    }

    public function validaUrl($url) {

        $sql = $this->db->prepare("SELECT nome_url FROM urls WHERE nome_url = :url");

        $sql->bindValue(':url', $url, PDO::PARAM_STR);
        $sql->execute();

        $retorno = $sql->fetchObject();

        if (empty($retorno) || is_null($retorno)) {
            return true;
        } else {
            return false;
        }
    }

    public function verificaUrlSessaoUsuario() {

        $url = $_SERVER['REQUEST_URI'];
        
        $idPerfilUsuarioLogado = $_SESSION['usuario']['id_perfil'];

        $sql = $this->db->prepare("select nome_url from urls u
                            join perfis_url p on u.id_url = p.fk_id_url
                            and p.fk_id_perfil = :idPerfil
                            and u.nome_url = :url");

        $sql->bindValue(':idPerfil', $idPerfilUsuarioLogado, PDO::PARAM_INT);
        $sql->bindValue(':url', $url, PDO::PARAM_STR);
        $sql->execute();

        $retorno = $sql->fetchColumn();

        if ($retorno == false) {
            return false;
        } else {
            return true;
        }
    }

}
