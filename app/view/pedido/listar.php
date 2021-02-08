<?php

use Mini\Controller\index;
use Mini\Model\Mesa;
use Mini\Model\Pedido;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => '#',
        'text' => 'Pedidos'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Histórico de Pedidos </h1>
    <div class="box">
        <?php

        foreach ($pedidos as $id => $value) {
            $mesa = (new Mesa())->getMesa($value['mesa_idmesa']);
            $pedido = (new Pedido())->getItensPedido($value['idpedido']);
            echo "<pre>";
            print_r($pedido);
            exit();
            ?>
            <ul class="history">
                <li class="mesa"><span>Mesa <?= $mesa->numero ?></span> <span><?= $value['data_pedido'] ?></span></li>
                <ul class="pedido-item">
                    <li>Status <span>Ativo</span></li>
                    <li>Detalhes <span><?= $value['observacoes'] ?></span></li>
                    <li>Valor Total <span>Total</span></li>
                    <li>Show pedidos<span>icon</span></li>
                    <ul>
                        <?php foreach ($pedido as $v) { ?>
                            <li></li>
                        <?php } ?>
                    </ul>
                </ul>
            </ul>
        <?php } ?>
    </div>
</div>
