<?php

class usuariosController extends Controller {

    public function cadastrar(){

        $dados = array();
        
        try{
            
            $this->loadTemplate('usuarios/cadastrar', $dados);

        }catch(Exception $e){

        }


    }
    
}
