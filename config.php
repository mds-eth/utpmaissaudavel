<?php

require 'environment.php';

$config = array();

if (ENVIRONMENT == 'development') {

    define("BASE_URL", "http://utpmaissaudavel.com.br/");
    $config['dbname'] = 'utpmaissaudavel';
    $config['host'] = '127.0.0.1';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
} else {

    define("BASE_URL", "http://utpmaissaudavel.com.br/");
    $config['dbname'] = 'classificados';
    $config['host'] = '127.0.0.1';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
}

global $db;
try {
    $db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
    exit;
}