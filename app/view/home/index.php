<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => '#',
        'text' => 'Home'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Mesa Disponíveis</h1>
    <div class="mesas">
        <?php foreach ($mesasfree as $id => $v) { ?>
            <a href="<?= URL . 'produtos/listar?id=' . $v->idmesa ?>">
                <img src="<?= URL . '/public/img/table.png' ?>"/>
                <span>
                    <h4>Mesa <?= $v->numero ?></h4>
                    <h5>Mesa <?= $v->descricao ?></h5>
                </span>
            </a>
        <?php } ?>
    </div>
</div>

<div class="container">
    <h1>Mesa Ocupadas</h1>
    <div class="mesas">
        <?php foreach ($mesasbusy as $id => $v) { ?>
            <a href="<?= URL . 'pedido/?id=' . $v->idpedido ?>" class="busy">
                <img src="<?= URL . '/public/img/table.png' ?>"/>
                <span>
                    <h4>Mesa <?= $v->numero ?></h4>
                    <h5>Mesa <?= $v->descricao ?></h5>
                </span>
            </a>
        <?php } ?>
    </div>
</div>
</div>
