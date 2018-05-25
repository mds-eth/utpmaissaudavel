<?php

class pessoasController extends controller {

    private $pessoa;
    private $telefone;
    private $endereco;
    private $usuario;

    public function __construct() {

        $this->pessoa = new Pessoas();
        $this->usuario = new Usuarios();
        $this->endereco = new Enderecos();
        $this->telefone = new Telefones();

        if (!$this->pessoa->logado()) {
            header('Location: ' . URL . '/login');
        }
    }

    public function cadastrar() {

        $dados = array();

        try {

            if ($this->post()) {

                $nome = trim($_POST['nome']);
                $dataNascimento = trim($_POST['dataNascimento']);
                $sexo = trim($_POST['sexo']);
                $cpf = trim($_POST['cpf']);
                $rg = trim($_POST['rg']);
                $email = trim($_POST['email']);

                $fkIdPessoa = $this->pessoa->gravar($nome, $dataNascimento, $sexo, $cpf, $rg, $email);

                $residencial = trim($_POST['residencial']);
                $celular = trim($_POST['celular']);
                $contato = trim($_POST['contato']);

                $this->telefone->gravar($residencial, $celular, $contato, $fkIdPessoa);

                $cep = trim($_POST['cep']);
                $rua = trim($_POST['rua']);
                $bairro = trim($_POST['bairro']);
                $cidade = trim($_POST['cidade']);
                $estado = trim($_POST['estado']);
                $numero = trim($_POST['numero']);
                $complemento = trim($_POST['complemento']);

                $this->endereco->gravar($cep, $rua, $bairro, $cidade, $estado, $numero, $complemento, $fkIdPessoa);

                $perfil = trim($_POST['perfil']);
                $this->usuario->gravar($perfil, $fkIdPessoa);

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

    public function buscaPessoaParaEdicao() {

        try {

            if ($this->post()) {

                $id = $_POST['id'];

                $pessoa = $this->pessoa->buscaRegistroPessoaEdicao($id);

                echo json_encode($pessoa);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscaPessoaParaExclusao() {

        try {

            if ($this->post()) {

                $id = $_POST['id'];
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function visualizar() {

        $dados = array();
        $dados['pessoas'] = $this->pessoa->listaTodosUsuarios();


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

        if (isset($_POST) && !empty($_POST)) {

            $cpf = $_POST['cpf'];
            echo $this->pessoa->validaCpf($cpf);
            exit();
        }
    }

}
