<?php

namespace Mini\Controller;

use Mini\Model\Funcao;

class FuncaoController {

    public function index() {
        $user = json_decode($_COOKIE['login']);
        if($user->funcao_idfuncao != 1) header('location: ' . URL);

        $funcao = new Funcao();
        $funcoes = $funcao->getAllFuncao();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/funcao/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if(isset($_POST["submit_add_funcao"])) {
            $funcao = new Funcao();
            $funcao->add($_POST["nome"], $_POST["status"]);
        }

        header('location: ' . URL . 'funcao/index');
    }

    public function delete($funcao_id) {
        if(isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao->delete($funcao_id);
        }

        header('location: ' . URL . 'funcao/index');
    }

    public function edit($funcao_id) {
        if(isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao = $funcao->getFuncao($funcao_id);

            if($funcao === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/funcao/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            header('location: ' . URL . 'funcao/index');
        }
    }

    public function update() {
        if(isset($_POST["submit_update_funcao"])) {
            $funcao = new Funcao();
            $funcao->update($_POST["nome"], $_POST["status"], $_POST['funcao_id']);
        }

        header('location: ' . URL . 'funcao/index');
    }
}
