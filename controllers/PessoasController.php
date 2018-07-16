<?php

class PessoasController extends controller {

    private $url;
    private $log;
    private $pessoa;
    private $perfil;
    private $usuario;
    private $telefone;
    private $endereco;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->url = new Urls();
        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }

        $this->log = new Logs();
        $this->perfil = new Perfis();
        $this->pessoa = new Pessoas();
        $this->telefone = new Telefones();
        $this->endereco = new Enderecos();
    }

    public function cadastrar() {

        $dados = array();

        try {

            if ($this->post()) {

                $this->pessoa->setNome(trim(addslashes($_POST['nome'])));
                $this->pessoa->setDataNascimento(trim(addslashes($_POST['dataNascimento'])));
                $this->pessoa->setSexo(trim(addslashes($_POST['sexo'])));
                $this->pessoa->setCpf(!empty($_POST['cpf']) ? trim(addslashes($_POST['cpf'])) : null);
                $this->pessoa->setRg(trim(addslashes($_POST['rg'])));
                $this->pessoa->setEmail(trim(addslashes($_POST['email'])));
                $this->pessoa->setCodigo(isset($_POST['codigo']) ? trim(addslashes($_POST['codigo'])) : null);

                $fkIdPessoa = $this->pessoa->gravar();

                $this->telefone->setResidencial(!empty($_POST['residencial']) ? trim(addslashes($_POST['residencial'])) : null);
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
                $this->usuario->gravar($_POST['email']);

                echo true;
            } else {

                $dados['perfis'] = $this->perfil->buscaPerfis();
                $this->loadTemplate('pessoas/cadastrar', $dados);
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
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
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

    public function inativarPessoa() {

        try {

            if ($this->post()) {

                $this->pessoa->inativarPessoa($_POST['idPessoa']);

                echo true;
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
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
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

    public function buscaPessoaParaInativar() {

        try {

            if ($this->post()) {

                $id = $_POST['id'];
                $pessoaExclusao = $this->pessoa->buscaPessoaParaInativar($id);

                echo json_encode($pessoaExclusao[0]);
            }
        } catch (Exception $exc) {
            $this->log->logError(__CLASS__, __FUNCTION__, $exc->getMessage(), $_SESSION['usuario']['id_usuario']);
        }
    }

    public function listagem() {

        $dados = array();
        $dados['pessoas'] = $this->pessoa->listaPessoasAtivas();


        $this->loadTemplate('pessoas/listagem', $dados);
    }

    public function inativas() {

        $dados['inativas'] = $this->pessoa->listaPessoasInativas();

        $this->loadTemplate('pessoas/inativas', $dados);
    }

    public function buscaPessoaParaReativar() {

        if ($this->post()) {

            $pessoa = $this->pessoa->buscaPessoaParaReativar($_POST['id']);

            echo json_encode($pessoa);
        }
    }

    public function reativarPessoa() {

        if ($this->post()) {

            echo $this->pessoa->reativarPessoa($_POST['id']);
        }
    }

    public function validaCpf() {

        if ($this->post()) {

            $retorno = $this->pessoa->validaCpf($_POST['cpf']);

            echo json_encode($retorno);
        }
    }

    public function perfil() {

        $dados['perfil'] = $this->pessoa->listaPerfilPessoa($_SESSION['usuario']['id_pessoa']);

        $this->loadTemplate('pessoas/perfil', $dados);
    }

    public function pessoa($id) {

        $dados['pessoa'] = $this->pessoa->listaPerfilPessoa($id);

        if ($dados['pessoa'] == false) {
            header('Location: ' . URL . '/pessoas/listagem');
        } else {
            $this->loadTemplate('pessoas/pessoa', $dados);
        }
    }

}
