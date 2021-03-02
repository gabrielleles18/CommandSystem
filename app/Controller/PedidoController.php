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
        print_r('asd');
        exit();
        if (isset($_POST["cadastar_pedido"])) {
            $pedido = new Pedido();
            $produtoPedido = new ProdutoPedido();
            $mesa = new Mesa();

            if (!empty($_COOKIE['dataCard'])) {
                $dataPedido = json_decode($_COOKIE['dataCard']);
                $usuario = json_decode($_COOKIE['login']);

                $status_id = (new Status())->getStatusAberto()->id;

                if (!empty($status_id)) {
                    $pedido->add(date("d/m/Y H:i:s"), $_POST['observacoes'], $_COOKIE['total-cart'],
                        $status_id, $_POST["mesa_id"], $usuario->idfuncionario);
                }

                foreach ($dataPedido as $value) {
                    $produtoPedido->add($value->id, (new Pedido)->lastID()->idpedido, $value->qt);
                }
                $mesa->changeStatus($_POST["mesa_id"]);
                unset($_COOKIE['dataCard']);
                unset($_COOKIE['total-cart']);
            } else {
                return '';
            }
        }
        header('location: ' . URL);
    }

    /**
     * ACTION: delete
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/delete
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o botãoe "excluir um funcao" em funcao/index
     * direciona o usuário após o clique. Este método trata de todos os dados da requisição GET (na URL!) E depois
     * redireciona o usuário de volta para funcao/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação GET.
     * @param int $funcao_id Id do funcao para excluir
     */
    public
    function delete($funcao_id) {
        if (isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao->delete($funcao_id);
        }

        header('location: ' . URL . 'funcao/index');
    }

    /**
     * ACTION: edit
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/edit
     * @param int $funcao_id Id do funcao a editar
     */
    public
    function edit($funcao_id) {
        if (isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao = $funcao->getFuncao($funcao_id);

            if ($funcao === false) {
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

    /**
     * ACTION: update
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/update
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o form "atualizar um funcao" fica funcao/edit
     * direciona o usuário após o envio do formulário. Esse método manipula todos os dados POST do formulário e, em seguida, redireciona
     * o usuário de volta para funcao/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação POST.
     */
    public function update() {
        if (isset($_POST["submit_update_funcao"])) {
            $funcao = new Funcao();
            $funcao->update($_POST["nome"], $_POST["status"], $_POST['funcao_id']);
        }

        header('location: ' . URL . 'funcao/index');
    }

    public function updateStatus() {
        if (!empty($_POST['alter_status'])) {
            $status_id = (new Status())->getStatusAberto($_POST['status'])->id;

            if (!empty($status_id)) {
                (new Pedido())->updateStatus($_POST['idpedido'], $status_id);

                if (!empty($_POST['mesa_idmesa'])) {
                    (new Mesa())->changeStatus($_POST['mesa_idmesa'], 1);
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
}
