<?php

class loginController extends controller {

    private $pessoas;

    public function __construct() {
        $this->pessoas = new Pessoas();
    }

    public function index() {

        $dados = array();
        $this->loadView('login', $dados);
    }

    public function logar() {

        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        echo $this->pessoas->validaLogin($email, md5($senha));
    }

    public function logout() {

        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ' . URL . '/login');
    }

}
