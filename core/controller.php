<?php

class controller {
    
    public function loadView($viewName, $viewData = array()) {

        extract($viewData);
        $file = 'views/' . $viewName . '.php';

        if (file_exists($file)) {
            include 'views/' . $viewName . '.php';
        } else {
            echo "<b>ERRO:</b> View $viewName não encontrada.";
        }
    }

    public function loadTemplate($viewName, $viewData = array()) {

        include 'views/template.php';
    }

    public function loadViewNovaSenha() {

        include 'views/senha.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {

        extract($viewData); // Transforma a chave do array em variavel.
        $file = 'views/' . $viewName . '.php';
        if (file_exists($file)) {
            include 'views/' . $viewName . '.php';
        } else {
            echo "<b>ERRO:</b> View $viewName não encontrada.";
        }
    }

    public function post() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return true;
        } else {
            return false;
        }
    }

    protected function mandaEmailAdmErroAplicacao($erro) {

        $para = "michaeldouglas.10.94@gmail.com";
        $mensagem = "Erro Aplicação UTP - Mais Saudavel";

        mail($mensagem, $para, $message, $erro);
    }

}
