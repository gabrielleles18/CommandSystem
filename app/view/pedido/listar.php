<?php

use Mini\Controller\index;
use Mini\Model\Mesa;
use Mini\Model\Pedido;
use Mini\Model\Status;

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
            $status = new Status();
            ?>
            <ul class="history">
                <li class="mesa">
                    <span>Mesa <?= $mesa->numero ?></span>
                    <div>
                        <span><?= $value['data_pedido'] ?></span>
                        <i class="fas fa-plus icon"></i>
                    </div>
                </li>
                <ul class="pedido-item">
                    <li>Status <span><?= $status->getStatus($value['status_id'])->slug ?></span></li>
                    <li>Detalhes <span><?= $value['observacoes'] ?></span></li>
                    <li>Valor Total <span class="total_ever"></span></li>
                    <li>Protudos<i class="fas fa-plus icon"></i></li>
                    <ul class="lastul">
                        <li class="prods">
                            <div>Quantidade</div>
                            <div>Nome</div>
                            <div>Preço</div>
                        </li>
                        <?php
                        $total = 0;
                        $total_ever = 0;
                        foreach ($pedido as $v) {
                            $total = $v['qt_prod'] * $v['preco'];
                            $total_ever = $total_ever + ($v['qt_prod'] * $v['preco']);
                            ?>
                            <li>
                                <div><?= $v['qt_prod'] ?></div>
                                <div><?= $v['nome'] ?></div>
                                <div><?= $total ?></div>
                            </li>
                        <?php } ?>
                        <span class="total_ever_hidden" data-total="<?= $total_ever ?>"></span>
                    </ul>
                </ul>
            </ul>
        <?php } ?>
    </div>
</div>
