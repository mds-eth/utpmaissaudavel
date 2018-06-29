<?php

class LogsController extends controller {

    private $log;
    private $url;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }

        $this->log = new Logs();
    }

    public function listagem() {

        $dados['logs'] = $this->log->listaLogs();

        if (!is_null($dados['logs'])) {
            $this->loadTemplate('logs/listagem', $dados);
        } else {
            header('Location: ' . URL . '/home');
        }
    }

}
