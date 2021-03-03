<?php


namespace Mini\Controller;


use Mini\Model\Estatistica;

class EstatisticaController
{

    public function index()
    {

        if (isset($_POST['submit_estatistic'])) {
            echo "<pre>";
            print_r($_POST);
            exit();

            $pedidobyuser = (new Estatistica())->getAllPedidosByUser();
            $produto = (new Estatistica())->geQtProduto();
            $totalprod = (new Estatistica())->getTotalProd();
            $totalpedido = (new Estatistica())->getTotalPedido();
            $totalvalorpedido = (new Estatistica())->getValorTotalPedido();

            if (!empty($totalprod)) {
                $total = 0;
                foreach ($totalprod as $value) {
                    $total += $value->soma_prod;
                }
            }
        }

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/estatistica/index.php';
        require APP . 'view/_templates/sidebar.php';
    }
}
