<?php

class usuariosController extends Controller {

    public function cadastrar() {

        $dados = array();

        try {

            $this->loadTemplate('usuarios/cadastrar', $dados);
        } catch (Exception $e) {
            
        }
    }

    public function novoUsuario() {
        
    }

    public function buscaCep($cep) {

        $dados = array();

        try {

            $endereco = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

            $dados['sucesso'] = (string) $endereco->resultado;
            $dados['rua'] = (string) $endereco->tipo_logradouro . ' ' . $endereco->logradouro;
            $dados['bairro'] = (string) $endereco->bairro;
            $dados['cidade'] = (string) $endereco->cidade;
            $dados['uf'] = (string) $endereco->uf;

            echo json_encode($dados);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
