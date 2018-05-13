<?php

class homeController extends Controller {
    
    public function index(){
        
        
        
        $dados = array(
            'nome' => 'Michael',
            'idade' => '24 anos'
        );
        
        $this->loadTemplate('home', $dados);
        
        
    }
}
