<?php

class Core {

    public function run() {

        $acesso = $_SERVER['REQUEST_URI'];
        $perfil = new perfisController();
        $retorno = $perfil->verificaAcessoUrl($acesso);

        if ($retorno == false) {
            return BASE_URL . 'home';
        }

        $url = '/';
        $params = array();
        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        if (!empty($_POST)) {
            $params['email'] = $_POST['email'];
            $params['senha'] = $_POST['senha'];
        }

        if (isset($_GET['cep'])) {
            $params = $_GET['cep'];
        }

        if (isset($_GET['perfil'])) {
            $params = $_GET['perfil'];
        }

        if (!empty($url) && $url != '/') {

            $url = explode('/', $url);

            array_shift($url);

            $currentController = $url[0] . 'Controller';
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
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

        $current = new $currentController();

        call_user_func_array(array($current, $currentAction), array($params));
    }

}
