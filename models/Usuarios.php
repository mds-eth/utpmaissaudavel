<?php

class Usuarios extends model {

    private $fkIdPerfil;
    private $fkIdPessoa;

    public function gravar() {

        $date = date("Y-m-d H-i-s");
        $idUsuario = $_SESSION['usuario']['id_usuario'];
        
        try {
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }

    public function Usuarios($fkIdPerfil, $fkIdPessoa) {

        $this->fkIdPerfil = $fkIdPerfil;
        $this->fkIdPessoa = $fkIdPessoa;
    }

    function getFkIdPerfil() {
        return $this->fkIdPerfil;
    }

    function getFkIdPessoa() {
        return $this->fkIdPessoa;
    }

    function setFkIdPerfil($fkIdPerfil) {
        $this->fkIdPerfil = $fkIdPerfil;
    }

    function setFkIdPessoa($fkIdPessoa) {
        $this->fkIdPessoa = $fkIdPessoa;
    }

}
