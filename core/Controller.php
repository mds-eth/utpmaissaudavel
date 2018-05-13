<?php

class Controller {

    /**
     * Realiza o carregamento da view solicitada pelo controller
     * @param array $dados -> Dados que o controller enviou para a view
     */
    public function loadView($viewName, $dados = array()) {

        extract($dados);

        require 'views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $dados = array()) {

        require 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $dados = array()) {

        if ($dados != null || !empty($dados)) {

            extract($dados);
        } else {

            $dados = 1;
        }

        if ($viewName == 'home') {
            return;
        }

        require 'views/' . $viewName . '.php';
    }

}
