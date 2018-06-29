<?php

class Logs extends Model {

    public function logError($class, $function, $exception, $id_usuario) {

        try {

            $sql = $this->db->prepare("INSERT INTO log_error(nome_classe, nome_metodo, exception, id_usuario) VALUES(
                :nome_classe, :nome_metodo, :exception, :id_usuario)");
            $sql->bindValue(':nome_classe', $class, PDO::PARAM_STR);
            $sql->bindValue(':nome_metodo', $function, PDO::PARAM_STR);
            $sql->bindValue(':exception', $exception, PDO::PARAM_STR);
            $sql->bindValue(':id_usuario', $id_usuario, PDO::PARAM_STR);

            $sql->execute();
        } catch (Exception $exc) {
            $this->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $this->idUsuario);
        }
    }

    public function listaLogs() {

        $sql = $this->db->prepare("SELECT * FROM log_error");
        $sql->execute();

        return !empty($logs = $sql->fetchAll()) ? $logs : null;
    }

}
