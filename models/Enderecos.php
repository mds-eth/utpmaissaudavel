<?php

class Enderecos extends model {

    public function gravar($cep, $rua, $bairro, $cidade, $estado, $numero, $complemento, $fkIdPessoa) {

        $idUsuario = $_SESSION['usuario']['id_usuario'];

        try {

            $sql = "INSERT INTO enderecos(fk_id_pessoa, cep, rua, bairro, cidade, estado, numero, complemento,
                 criado_por, criado_em, atualizado_por, atualizado_em) 
                 VALUES(:fk_id_pessoa, :cep, :rua, :bairro, :cidade, :estado, :numero, :complemento,
                :criado_por, :criado_em, :atualizado_por, :atualizado_em)";

            $pdo = $this->db->prepare($sql);

            $pdo->bindValue(':fk_id_pessoa', $fkIdPessoa, PDO::PARAM_INT);
            $pdo->bindValue(':cep', $cep, PDO::PARAM_STR);
            $pdo->bindValue(':rua', $rua, PDO::PARAM_STR);
            $pdo->bindValue(':bairro', $bairro, PDO::PARAM_STR);
            $pdo->bindValue(':cidade', $cidade, PDO::PARAM_STR);
            $pdo->bindValue(':estado', $estado, PDO::PARAM_STR);
            $pdo->bindValue(':numero', $numero, PDO::PARAM_STR);
            $pdo->bindValue(':complemento', $complemento, PDO::PARAM_STR);
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
