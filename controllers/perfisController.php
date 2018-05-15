<?php

class perfisController extends Controller {

    public function cadastrar() {

        $dados = array();

        $this->loadTemplate('perfis/cadastrar', $dados);
    }

    public function novo($perfil) {

        die("cheguei aqui");

        if (!empty($_POST) && $_POST != null) {

            $nomePerfil = $_POST['perfil'];
        }
    }

    public function verificaAcessoUrl($url) {

        if ($url != null || !empty($url)) {

            $perfil = new Perfis();
            $perfil->setUrl($url);
        }
        
        return true;
    }

}
