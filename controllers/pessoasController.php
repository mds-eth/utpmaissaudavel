<?php

class pessoasController extends controller {

    private $url;
    private $pessoa;
    private $usuario;
    private $telefone;
    private $endereco;

    public function __construct() {

        $this->url = new Urls();
        $this->pessoa = new Pessoas();
        $this->usuario = new Usuarios();
        $this->telefone = new Telefones();
        $this->endereco = new Enderecos();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }
    }

    public function cadastrar() {

        $dados = array();

        try {

            if ($this->post()) {

                $this->pessoa->setNome(trim(addslashes($_POST['nome'])));
                $this->pessoa->setDataNascimento(trim(addslashes($_POST['dataNascimento'])));
                $this->pessoa->setSexo(trim(addslashes($_POST['sexo'])));
                $this->pessoa->setCpf(trim(addslashes($_POST['cpf'])));
                $this->pessoa->setRg(trim(addslashes($_POST['rg'])));
                $this->pessoa->setEmail(trim(addslashes($_POST['email'])));
                $fkIdPessoa = $this->pessoa->gravar();

                $this->telefone->setResidencial(trim(addslashes($_POST['residencial'])));
                $this->telefone->setCelular(trim(addslashes($_POST['celular'])));
                $this->telefone->setContato(trim(addslashes($_POST['contato'])));
                $this->telefone->setFkIdPessoa($fkIdPessoa);
                $this->telefone->gravar();

                $this->endereco->setCep(trim(addslashes($_POST['cep'])));
                $this->endereco->setRua(trim(addslashes($_POST['rua'])));
                $this->endereco->setBairro(trim(addslashes($_POST['bairro'])));
                $this->endereco->setCidade(trim(addslashes($_POST['cidade'])));
                $this->endereco->setEstado(trim(addslashes($_POST['estado'])));
                $this->endereco->setNumero(trim(addslashes($_POST['numero'])));
                $this->endereco->setComplemento(trim(addslashes($_POST['complemento'])));
                $this->endereco->setFkIdPessoa($fkIdPessoa);
                $this->endereco->gravar();

                $this->usuario->setFkIdPerfil(trim(addslashes($_POST['perfil'])));
                $this->usuario->setFkIdPessoa($fkIdPessoa);
                $this->usuario->gravar();

                echo true;
            } else {

                $perfis = new Perfis();
                $dados['perfis'] = $perfis->buscaPerfis();

                $this->loadTemplate('pessoas/cadastrar', $dados);
            }
        } catch (Exception $exc) {

            $this->mandaEmailAdmErroAplicacao($exc);
        }
    }

    public function editar() {

        try {

            if ($this->post()) {

                $idPessoa = $_POST['idPessoa'];

                $this->pessoa->setNome(trim(addslashes($_POST['nome'])));
                $this->pessoa->setDataNascimento(trim(addslashes($_POST['dataNascimento'])));
                $this->pessoa->setCpf(trim(addslashes($_POST['cpf'])));
                $this->pessoa->setRg(trim(addslashes($_POST['rg'])));
                $this->pessoa->setEmail(trim(addslashes($_POST['email'])));
                $this->pessoa->atualizar($idPessoa);

                $this->telefone->setResidencial(trim(addslashes($_POST['residencial'])));
                $this->telefone->setCelular(trim(addslashes($_POST['celular'])));
                $this->telefone->setContato(trim(addslashes($_POST['contato'])));
                $this->telefone->setFkIdPessoa($idPessoa);
                $this->telefone->atualizar();

                $this->endereco->setCep(trim(addslashes($_POST['cep'])));
                $this->endereco->setRua(trim(addslashes($_POST['rua'])));
                $this->endereco->setBairro(trim(addslashes($_POST['bairro'])));
                $this->endereco->setCidade(trim(addslashes($_POST['cidade'])));
                $this->endereco->setEstado(trim(addslashes($_POST['estado'])));
                $this->endereco->setNumero(trim(addslashes($_POST['numero'])));
                $this->endereco->setComplemento(trim(addslashes($_POST['complemento'])));
                $this->endereco->setFkIdPessoa($idPessoa);
                $this->endereco->atualizar();

                echo true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function excluir() {

        try {

            if ($this->post()) {

                $idPessoa = $_POST['idPessoa'];
                $this->pessoa->excluir($idPessoa);

                echo true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscaPessoaParaEdicao() {

        try {

            if ($this->post()) {

                $id = $_POST['id'];
                $pessoaEdicao = $this->pessoa->buscaRegistroPessoaEdicao($id);

                echo json_encode($pessoaEdicao[0]);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function buscaPessoaParaExclusao() {

        try {

            if ($this->post()) {

                $id = $_POST['id'];
                $pessoaExclusao = $this->pessoa->buscaRegistroPessoaExclusao($id);

                echo json_encode($pessoaExclusao[0]);
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

        if ($this->post()) {

            $cep = $_POST['cep'];

            $dados = array();

            try {

                $endereco = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

                $dados['sucesso'] = (string) $endereco->resultado;
                $dados['rua'] = (string) $endereco->tipo_logradouro . ' ' . $endereco->logradouro;
                $dados['bairro'] = (string) $endereco->bairro;
                $dados['cidade'] = (string) $endereco->cidade;
                $dados['estado'] = (string) $endereco->uf;

                echo json_encode($dados);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }

    public function validaCpf() {

        if ($this->post()) {

            $cpf = $_POST['cpf'];
            $retorno = $this->pessoa->validaCpf($cpf);

            echo json_decode($retorno);
        }
    }

}
