<?php

class HomeController extends controller {

    private $usuario;
    private $paciente;

    public function __construct() {

        $this->usuario = new Usuarios();
        if (!$this->usuario->logado()) {
            header('Location: ' . URL . '/login');
        }

        $this->paciente = new Pacientes();
    }

    public function index() {

        $dados['pacientes'] = $this->paciente->verificaPacientesSemAgendamento();
        $this->loadTemplate('home', $dados);
    }

}
