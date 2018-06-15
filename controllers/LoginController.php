<?php

class LoginController extends controller {

    private $login;
    private $url;

    public function __construct() {
        $this->url = new Urls();
        $this->login = new Login;

        if ($this->url->validaSessaoTemporaria()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function index() {

        $dados = array();
        $this->loadView('login', $dados);
    }

    public function logar() {

        if ($this->post()) {

            if ($_POST['email'] == $_POST['senha']) {
                $this->login->setEmail(trim(addslashes($_POST['email'])));
                $this->login->setSenha(trim(addslashes($_POST['senha'])));
            } else {
                $this->login->setEmail(trim(addslashes($_POST['email'])));
                $this->login->setSenha(trim(addslashes(md5($_POST['senha']))));
            }

            $retorno = $this->login->validaLogin();

            echo json_encode($retorno);
        }
    }

    public function logout() {

        unset($_SESSION['usuario']);
        session_destroy();
        header('Location: ' . URL . '/login');
    }

    public function novo() {

        $this->loadViewNovaSenha();
    }

    public function novaSenha() {

        if ($this->post()) {

            $this->login->setId(trim(addslashes($_POST['id'])));
            $this->login->setSenha(trim(addslashes(md5($_POST['senha']))));

            echo $this->login->gravaSenhaPrimeiroAcessoUsuario();
        }
    }

}
