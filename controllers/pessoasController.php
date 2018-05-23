<?php

class pessoasController extends controller {

    private $pessoa;

    public function __construct() {

        $this->pessoa = new Pessoas();
        if (!$this->pessoa->logado()) {
            header('Location: ' . URL . '/login');
        }
    }

    public function cadastrar() {

        $dados = array();

        try {

            if (isset($_POST) && !empty($_POST)) {

                /* dados usuario */
                $nome = trim($_POST['nome']);
                $dataNascimento = trim($_POST['dataNascimento']);
                $sexo = trim($_POST['sexo']);
                $cpf = trim($_POST['cpf']);
                $rg = trim($_POST['rg']);
                $email = trim($_POST['email']);


                $this->pessoa->setNome($nome);
                $this->pessoa->setDataNascimento($dataNascimento);
                $this->pessoa->setSexo($sexo);
                $this->pessoa->setCpf($cpf);
                $this->pessoa->setRg($rg);
                $this->pessoa->setEmail($email);

                $fkIdPessoa = $this->pessoa->gravar();

                /* dados contato */
                $residencial = trim($_POST['residencial']);
                $celular = trim($_POST['celular']);
                $contato = trim($_POST['contato']);

                $telefone = new Telefones($residencial, $celular, $contato, $fkIdPessoa);
                $telefone->gravar();

                /* dados endereço */
                $cep = trim($_POST['cep']);
                $rua = trim($_POST['rua']);
                $bairro = trim($_POST['bairro']);
                $cidade = trim($_POST['cidade']);
                $estado = trim($_POST['estado']);
                $numero = trim($_POST['numero']);
                $complemento = trim($_POST['complemento']);

                $endereco = new Enderecos($cep, $rua, $bairro, $cidade, $estado, $numero, $complemento, $fkIdPessoa);
                $endereco->gravar();

                /* id perfil */
                $perfil = trim($_POST['perfil']);
                $usuario = new Usuarios($perfil, $fkIdPessoa);
                $usuario->gravar();

                echo true;
            } else {

                $perfis = new Perfis();
                $dados['perfis'] = $perfis->buscaPerfis();

                $this->loadTemplate('pessoas/cadastrar', $dados);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function visualizar() {

        $dados = array();
        $pessoas = $this->pessoa->listaTodos();

        $this->loadTemplate('pessoas/visualizar', $dados);
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

        $cpf = $_POST['cpf'];
        echo $this->pessoa->validaCpf($cpf);
        exit();
    }

}
