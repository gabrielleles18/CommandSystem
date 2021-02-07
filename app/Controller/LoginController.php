<?php


namespace Mini\Controller;

use Mini\Model\Login;


class LoginController {
    public function index() {

        require APP . 'view/_templates/head.php';
        require APP . 'view/login/index.php';
    }

    public function verify() {
        if (!empty($_POST['verify_usuario'])) {
            $login = new Login();

            $return = $login->verify($_POST['usuario'], $_POST['senha']);

            if (!empty($return)) {
                $data_usuario = json_encode($return);
                setcookie('login', $data_usuario, time() + 3600 * 24 * 5, '/');

                header('location: ' . URL);
            } else {
                echo "usuario nao encontrado!";
            }
        }
    }

    public function logoff() {
        unset($_COOKIE['login']);
        setcookie('login', null, -1, '/');
        header('location: ' . URL . 'login');
    }
}
