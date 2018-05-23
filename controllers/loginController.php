<?php

class loginController extends controller {    

    public function index() {

        $dados = array();
        $this->loadView('login', $dados);
    }

    public function logar() {
        
        $pessoa = new Pessoas();

        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        echo $pessoa->validaLogin($email, md5($senha));
    }

    public function logout() {

        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ' . URL . '/login');
    }

}
