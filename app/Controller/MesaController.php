<?php

namespace Mini\Controller;

use Mini\Model\Mesa;

class MesaController {
    public function index() {
        $mesa = new Mesa();
        $mesas = $mesa->getAllMessa();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/mesa/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if(isset($_POST["submit_add_mesa"])) {
            $mesa = new Mesa();
            $mesa->add($_POST["numero"], $_POST["descricao"], $_POST["status"]);
        }

        header('location: ' . URL . 'mesa/index');
    }

    public function delete($mesa_id) {
        if(isset($mesa_id)) {
            $mesa = new Mesa();
            $mesa->delete($mesa_id);
        }

        header('location: ' . URL . 'mesa/index');
    }

    public function edit($mesa_id) {
        if(isset($mesa_id)) {
            $mesa = new Mesa();
            $mesa = $mesa->getMesa($mesa_id);

            if($mesa === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/mesa/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            header('location: ' . URL . 'mesa/index');
        }
    }

    public function update() {
        if(isset($_POST["submit_update_mesa"])) {
            $mesa = new Mesa();
            $return = $mesa->update($_POST["numero"], $_POST["descricao"], $_POST["status"], $_POST['mesa_id']);
        }

        if($return) {
            $data = [
                'tipo' => 1,
                'mensagem' => 'Informações da mesa ' . $_POST["numero"] . ', foram alteradas com sucesso!'];
            setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
        }else{
            $data = [
                'tipo' => 0,
                'mensagem' => 'Erro inesperado!'];
            setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
        }

        header('location: ' . URL . 'mesa/index');
    }
}
