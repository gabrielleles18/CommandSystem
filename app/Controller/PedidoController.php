<?php

namespace Mini\Controller;

use Mini\Model\Mesa;
use Mini\Model\Pedido;
use Mini\Model\ProdutoPedido;
use Mini\Model\Status;

class PedidoController {

    public function index() {
        $pedido = (new Pedido())->getPedido($_GET['id']);
        $mesa = (new Mesa())->getMesa($pedido->mesa_idmesa);
        $proutdutos = (new Pedido())->getItensPedido($_GET['id']);
        $status = (new Status())->getAllStatus();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if(isset($_POST["cadastar_pedido"])) {

            $pedido = new Pedido();
            $produtoPedido = new ProdutoPedido();
            $mesa = new Mesa();

            if(!empty($_COOKIE['dataCard'])) {
                $dataPedido = json_decode($_COOKIE['dataCard']);
                $usuario = json_decode($_COOKIE['login']);

                $status_id = (new Status())->getStatusAberto(1)->id;

                if(empty($_POST['pedido_id'])) {
                    if(!empty($status_id)) {
                        $pedido->add(date("Y-m-d H:i:s"), $_POST['observacoes'], $_COOKIE['total-cart'], $status_id, $_POST["mesa_id"], $usuario->idfuncionario);
                    }
                    $mesa->changeStatus($_POST["mesa_id"]);
                }

                if(!empty($_POST['pedido_id'])) {
                    $id_pedido = $_POST['pedido_id'];
                } else {
                    $id_pedido = (new Pedido)->lastID()->idpedido;
                }

                foreach($dataPedido as $value) {
                    $produtoPedido->add($value->id, $id_pedido, $value->qt);
                }

                setcookie('dataCard', null, -1, '/');
                setcookie('total-cart', null, -1, '/');

            } else {
                return '';
            }
        }
        if(!empty($_POST['pedido_id'])) {
            header('location: ' . URL . 'pedido/?id=' . $_POST['pedido_id']);

        } else {
            header('location: ' . URL);
        }
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
            // redirecionar o usuário para a página de índice do funcao (pois não temos um funcao_id)
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

    public function updateStatus() {
        if(!empty($_POST['alter_status'])) {

            $status_id = (new Status())->getStatusAberto($_POST['status'])->id;

            if(!empty($status_id)) {
                (new Pedido())->updateStatus($_POST['idpedido'], $status_id);

                if(!empty($_POST['mesa_idmesa']) && $status_id == 2) {
                    $return = (new Mesa())->changeStatus($_POST['mesa_idmesa'], 1);

                    if($return) {
                        $data = [
                            'tipo' => 1,
                            'mensagem' => 'Status do pedido foi alterado com sucesso!'];
                        setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
                    }

                    if($return) header('location: ' . URL);
                }
            }
        }
    }

    public function listar() {
        $pedidos = (new Pedido())->getAllPedidos();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/pedido/listar.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function updateqt() {
        if(isset($_POST["submit_updateqt"])) {
            $data = [];
            $i = 0;
            $count = 0;
            foreach($_POST as $id => $value) {
                if($count > 2) {
                    $i++;
                    $count = 0;
                }

                if(!empty(explode('-', $id)[1]) == $i) {
                    $data[$i][explode('-', $id)[0]] = $value;
                }
                $count++;
            }

            $produto = new ProdutoPedido();
            foreach($data as $value) {
                $return = $produto->updateqt($value['idpedido'], $value["idproduto"], $value['qt_prod']);
            }

            if($return) {
                $data = [
                    'tipo' => 1,
                    'mensagem' => 'Quantidade de produto foi alterado com sucesso!'];
                setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
            }

            if(!empty($_POST['idpedido-0'])) {
                header('location: ' . URL . 'pedido/?id=' . $_POST['idpedido-0']);
            } else {
                header('location: ' . URL);
            }
        }
    }
}
