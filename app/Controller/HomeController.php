<?php


namespace Mini\Controller;

use Mini\Model\Mesa;

class HomeController {

    public function index() {
        $mesa = new Mesa();
        $mesasfree = $mesa->getMessaFree();
        $mesasbusy = $mesa->getMessaBusy();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/sidebar.php';
    }
}
