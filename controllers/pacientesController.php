<?php

class pacientesController extends controller {

    private $url;
    private $pessoa;
    private $usuario;
    private $unidade;
    private $endereco;
    private $telefone;
    private $paciente;
    private $especialidade;

    public function __construct() {

        $this->url = new Urls();
        $this->usuario = new Usuarios();

        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        if (!$this->url->verificaUrlSessaoUsuario()) {
            header('Location: ' . URL . '/home');
        }

        $this->pessoa = new Pessoas();
        $this->unidade = new Unidades();
        $this->paciente = new Pacientes();
        $this->endereco = new Enderecos();
        $this->telefone = new Telefones();
        $this->especialidade = new Especialidades();
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

                $fkIdPaciente = $this->pessoa->gravar();

                $this->paciente->setFkIdPaciente($fkIdPaciente);
                $this->paciente->setFkIdUnidadeSaude(trim(addslashes($_POST['unidade'])));
                $this->paciente->setEspecialidades(trim(addslashes($_POST['especialidade'])));
                $this->paciente->setConvenio(trim(addslashes($_POST['convenio'])));
                $this->paciente->gravaTabelaDadosPacientes();

                $this->telefone->setResidencial(trim(addslashes($_POST['residencial'])));
                $this->telefone->setCelular(trim(addslashes($_POST['celular'])));
                $this->telefone->setContato(trim(addslashes($_POST['contato'])));
                $this->telefone->setFkIdPessoa($fkIdPaciente);
                $this->telefone->gravar();

                $this->endereco->setCep(trim(addslashes($_POST['cep'])));
                $this->endereco->setRua(trim(addslashes($_POST['rua'])));
                $this->endereco->setBairro(trim(addslashes($_POST['bairro'])));
                $this->endereco->setCidade(trim(addslashes($_POST['cidade'])));
                $this->endereco->setEstado(trim(addslashes($_POST['estado'])));
                $this->endereco->setNumero(trim(addslashes($_POST['numero'])));
                $this->endereco->setComplemento(trim(addslashes($_POST['complemento'])));
                $this->endereco->setFkIdPessoa($fkIdPaciente);
                $this->endereco->gravar();

                echo true;
            } else {

                $dados['unidades'] = $this->unidade->listaTodasUnidades();
                $dados['especialidades'] = $this->especialidade->listaTodasEspecialidades();

                $this->loadTemplate('pacientes/cadastrar', $dados);
            }
        } catch (Exception $ex) {

            var_dump($ex);
            die("error");
        }
    }

    public function visualizar() {

        $dados['pacientes'] = $this->paciente->listaTodosPacientes();

        $this->loadTemplate('pacientes/visualizar', $dados);
    }

}
