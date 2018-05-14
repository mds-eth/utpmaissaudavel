<?php

class perfisController extends Controller {

    public function cadastrar($perfil) {
        
        $dados = array();

        if (!is_null($perfil) && !empty($perfil)) {

            try {

                $perfil = new Perfis();
                $perfil->setPerfil($perfil);

                $retorno = $perfil->gravaPerfil();


                $this->loadTemplate('perfis/cadastrar', $dados);
            } catch (Exception $e) {
                
            }
        }
    }

    public function novo() {

        die("cheguei aqui");

        if (!empty($_POST) && $_POST != null) {

            $nomePerfil = $_POST['perfil'];
        }
    }

}
