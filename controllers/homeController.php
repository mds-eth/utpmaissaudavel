<?php

class homeController extends controller {
    private $pessoas;
    
    public function __construct() {
        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: '.URL.'/login');
        }
    }

    public function index() {
        $dados = array();
        $this->loadTemplate('home', $dados);
    }

}

?>