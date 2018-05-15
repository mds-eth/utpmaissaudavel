<?php

class loginController extends Controller {

    public function logar() {

        if (!empty($_POST['email']) && !empty($_POST['senha'])) {

            $email = trim($_POST['email']);
            $senha = trim(md5($_POST['senha']));

            $login = new Login();
            $login->setEmail($email);
            $login->setSenha($senha);

            $retorno = $login->logar();

            if ($retorno) {
                echo $retorno;
            } else {
                return false;
            }
        }
    }

    public function novaSenha() {

    }

}
