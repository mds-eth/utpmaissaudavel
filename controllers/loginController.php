<?php

class loginController extends controller {

    public function index() {

        $dados = array();
        $this->loadView('login', $dados);
    }

    public function logar() {

        if ($this->post()) {

            $login = new Login();
            $login->setEmail(trim(addslashes($_POST['email'])));
            $login->setSenha(trim(addslashes(md5($_POST['senha']))));
            echo $login->validaLogin();
        }
    }

    public function logout() {

        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ' . URL . '/login');
    }

}
