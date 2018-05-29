<?php

define('versao', 'prd');
define('drive', 'mysql');
define('URL', 'http://utpmaissaudavel.com.br');

global $config;
$config = array();

if (versao == 'dsv') {

    $config['dbname'] = 'utpmaissaudavel';
    $config['host'] = '127.0.0.1';
    $config['user'] = 'root';
    $config['pass'] = 'root';
}

if (versao == 'prd') {

    $config['dbname'] = 'utpmaissaudavel';
    $config['host'] = '127.0.0.1';
    $config['user'] = 'root';
    $config['pass'] = 'root';
}