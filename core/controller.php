<?php

class controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData); // Transforma a chave do array em variavel.
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

    public function loadViewInTemplate($viewName, $viewData = array()) {
        
        extract($viewData); // Transforma a chave do array em variavel.
        $file = 'views/' . $viewName . '.php';
        if (file_exists($file)) {
            include 'views/' . $viewName . '.php';
        } else {
            echo "<b>ERRO:</b> View $viewName não encontrada.";
        }
    }

}

?>