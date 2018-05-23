<?php

class pacientesController {

    private $pessoas;

    public function __construct() {
        $this->pessoas = new Pessoas();
        if (!$this->pessoas->logado()) {
            header('Location: ' . URL . '/login');
        }
    }

}
