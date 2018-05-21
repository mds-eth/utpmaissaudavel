<?php

class pessoasController extends controller {

    private $pessoas;
    private $telefone;

    public function __construct() {

        $this->pessoas = new Pessoas();
        $this->telefone = new Telefones;
    }

    public function cadastrar() {

        $dados = array();

        if (isset($_POST) && !empty($_POST)) {

            /* dados usuario */
            $nome = trim($_POST['nome']);
            $dataNascimento = trim($_POST['dataNascimento']);
            $sexo = trim($_POST['sexo']);
            $cpf = trim($_POST['cpf']);
            $rg = trim($_POST['rg']);
            $email = trim($_POST['email']);

            $this->pessoas->setNome($nome);
            $this->pessoas->setDataNascimento($dataNascimento);
            $this->pessoas->setSexo($sexo);
            $this->pessoas->setCpf($cpf);
            $this->pessoas->setRg($rg);
            $this->pessoas->setEmail($email);

            $fkPessoa = $this->pessoas->gravar();

            /* dados contato */
            $residencial = trim($_POST['residencial']);
            $celular = trim($_POST['celular']);
            $contato = trim($_POST['contato']);

            /* dados endereço */
            $cep = trim($_POST['cep']);
            $rua = trim($_POST['rua']);
            $bairro = trim($_POST['bairro']);
            $cidade = trim($_POST['cidade']);
            $estado = trim($_POST['estado']);
            $numero = trim($_POST['numero']);
            $complemento = trim($_POST['complemento']);

            /* id perfil */
            $perfil = trim($_POST['perfil']);
        } else {

            $perfis = new Perfis();
            $dados['perfis'] = $perfis->buscaPerfis();

            $this->loadTemplate('pessoas/cadastrar', $dados);
        }
    }

    public function buscaCep() {

        $cep = $_GET['cep'];

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

    public function validaCpf() {

        $cpf = $_GET['cpf'];
        $retorno = $this->usuarios->validaCpf($cpf);
    }

}
