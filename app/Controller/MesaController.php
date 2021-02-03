<?php


namespace Mini\Controller;


use Mini\Model\Mesa;

class MesaController {
    public function index() {
        $mesa = new Mesa();
        $mesas = $mesa->getAllMessa();
        $amount_of_mesa = $mesa->getAmountOfMesa();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/mesa/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if (isset($_POST["submit_add_mesa"])) {
            $mesa = new Mesa();
            $mesa->add($_POST["numero"], $_POST["descricao"], $_POST["status"]);
        }

        header('location: ' . URL . 'mesa/index');
    }

    public function delete($mesa_id) {
        if (isset($mesa_id)) {
            $mesa= new Mesa();
            $mesa->delete($mesa_id);
        }

        header('location: ' . URL . 'mesa/index');
    }

    public function edit($mesa_id) {
        if (isset($mesa_id)) {
            $mesa = new Mesa();
            $mesa = $mesa->getMesa($mesa_id);

            if ($mesa === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/mesa/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            // redirecionar o usuário para a página de índice do funcao (pois não temos um funcao_id)
            header('location: ' . URL . 'mesa/index');
        }
    }

    public function update() {
        if (isset($_POST["submit_update_mesa"])) {
            $mesa = new Mesa();
            $mesa->update($_POST["numero"], $_POST["descricao"], $_POST["status"], $_POST['mesa_id']);
        }

        header('location: ' . URL . 'mesa/index');
    }
}
