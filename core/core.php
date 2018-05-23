<?php

class core {

    public function run() {

        global $config;
        if (versao == 'dsv') {

            $url = explode("index.php", $_SERVER['PHP_SELF']);
            $url = end($url);
        }

        if (versao == 'prd') {

            $url = '/' . (isset($_GET['q']) ? $_GET['q'] : '');
        }

        $params = array();
        if (!empty($url) && $url != '/') {

            $url = explode('/', $url);
            array_shift($url);
            $currentController = $url[0] . 'Controller';
            if (!class_exists($currentController)) {
                exit("<b>ERRO:</b> $currentController não encontrada.");
            }

            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {

                $currentAction = $url[0];

                if (!method_exists($currentController, $currentAction)) {

                    exit("<b>ERRO:</b> Método $currentAction não encontrado.");
                }

                array_shift($url);
            } else {
                $currentAction = 'index';
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }

}
