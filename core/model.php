<?php

class model {

    protected $db;

    public function __construct() {
        global $config;

        try {

            $this->db = new PDO('mysql:dbname=' . $config['dbname'] . ';charset=utf8;host=' . $config['host'], $config['user'], $config['pass']);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            
            
        } catch (PDOException $e) {
            exit('Erro ao conectar no Banco de Dados Mysql: ' . $e->getMessage());
        }
    }

}

?>