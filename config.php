<?php

define('versao', 'prd'); // Alterar para 'prd' quando for colocar em produção.
define('drive', 'mysql'); // coloca o drive do banco que será usado.
define('URL', 'http://utpmaissaudavel.com.br'); // Sempre alterar quando iniciar novo projeto.

global $config;
$config = array();

$host = '(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 127.0.0.1)(PORT = 1521))
           (CONNECT_DATA = (SERVER = DEDICATED) (SID = BANCO)))';

if (versao == 'dsv') {
    if (drive == 'sqlvr') {
        $config['dbname'] = '';
        $config['host'] = '';
        $config['user'] = '';
        $config['pass'] = '';
    }
    if (drive == 'mysql') {
        $config['dbname'] = 'utpmaissaudavel';
        $config['host'] = '127.0.0.1';
        $config['user'] = 'root';
        $config['pass'] = 'root';
    }
    if (drive == 'oracle') {
        $config['host'] = $host;
        $config['user'] = 'system';
        $config['pass'] = 'forca';
    }
}

if (versao == 'prd') {
    if (drive == 'sqlvr') {
        $config['dbname'] = '';
        $config['host'] = '';
        $config['user'] = '';
        $config['pass'] = '';
    }
    if (drive == 'mysql') {
        $config['dbname'] = 'utpmaissaudavel';
        $config['host'] = '127.0.0.1';
        $config['user'] = 'root';
        $config['pass'] = 'root';
    }
    if (drive == 'oracle') {
        $config['host'] = $host;
        $config['user'] = 'system';
        $config['pass'] = 'forca';
    }
}
?>