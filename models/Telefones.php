<?php

class Telefones extends model {

    public function gravar($residencial, $celular, $contato, $fkIdPessoa) {

        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO telefones(fk_id_pessoa, telefone, celular, contato, criado_por, criado_em, atualizado_por, atualizado_em) VALUES(:fk_id_pessoa, 
                :telefone, :celular, :contato, :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $fkIdPessoa, PDO::PARAM_INT);
            $pdo->bindValue(':telefone', $residencial, PDO::PARAM_STR);
            $pdo->bindValue(':celular', $celular, PDO::PARAM_STR);
            $pdo->bindValue(':contato', $contato, PDO::PARAM_STR);
            $pdo->bindValue(':criado_por', $idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':criado_em', $date, PDO::PARAM_STR);
            $pdo->bindValue(':atualizado_por', $idUsuario, PDO::PARAM_INT);
            $pdo->bindValue(':atualizado_em', $date, PDO::PARAM_STR);

            $pdo->execute();
        } catch (Exception $exc) {

            echo $exc->getTraceAsString();
        }
    }

}
