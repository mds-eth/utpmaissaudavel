<?php

class unidadesController extends controller {
    
    public function cadastrar(){
        
        if($this->post()){
            
        }else{
            
            $dados = array();
            
            $this->loadTemplate('unidades/cadastrar', $dados);
        }
        
    }
    
}
