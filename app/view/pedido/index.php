<?php

use Mini\Controller\index;
use Mini\Model\Mesa;

$mesa = (new Mesa())->getMesa($pedido->mesa_idmesa);

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '#',
        'text' => 'Pedido'
    ],
    [
        'url' => URL . '#',
        'text' => 'Mesa ' . $mesa->numero
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Pedido</h1>
    <div class="box">
        <div class="busy">
            <img src="<?= URL . '/public/img/table.png' ?>"/>
            <span>
                <h4>Mesa <?= $mesa->numero ?></h4>
                <h5>Mesa <?= $mesa->descricao ?></h5>
            </span>
            <?php
            if ($pedido->status == 1)
                $status = 'Aberto';
            elseif ($pedido->status == 0)
                $status = 'Fechado';
            else
                $status = 'Em andamento';
            ?>
        </div>
        <ul class="pedido-item">
            <li>Status <span><?= $status ?></span></li>
            <li>Detalhes <span><?= $pedido->observacoes ?></span></li>
            <li>Data/Hora <span><?= $pedido->data_pedido ?></span></li>
            <li>Valor Total <span><?= $pedido->valor ?></span></li>
        </ul>
    </div>
</div>
</div>
