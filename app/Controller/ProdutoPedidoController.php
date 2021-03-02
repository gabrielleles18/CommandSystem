<?php


namespace Mini\Controller;

use Mini\Model\ProdutoPedido;


class ProdutoPedidoController {
    public function add() {
        if (isset($_POST["cadastar_pedido"])) {
            $pedido = new Pedido();

            $pedido->add('23/01/2021', 'observações', '10.00',
                'ativo', 1, 1);
        }

//        header('location: ' . URL . 'funcao/index');
    }
}
