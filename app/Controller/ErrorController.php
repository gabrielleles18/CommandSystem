<?php

namespace Mini\Controller;

class ErrorController {

    public function index() {
        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/sidebar.php';
    }
}
