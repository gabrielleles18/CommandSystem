<?php

use Mini\Controller\Index;
use Mini\Model\Pedido;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => '#',
        'text' => 'Home'
    ]
]);
$pedido = new Pedido();
?>
<? //= $breadcrumb ?>
<div class="container">
    <h1>Mesa Disponíveis</h1>
    <div class="mesas">
        <?php
        if (!empty($mesasfree)) {
            foreach ($mesasfree as $id => $v) { ?>
                <a href="<?= URL . 'produtos/listar?id=' . $v->idmesa ?>">
                    <img src="<?= URL . '/public/img/table.png' ?>"/>
                    <span>
                    <h4>Mesa <?= $v->numero ?></h4>
                    <h5>Mesa <?= $v->descricao ?></h5>
                </span>
                </a>
            <?php }
        } else {
            echo "<h3>Nenhuma mesa disponível</h3>";
        } ?>
    </div>
</div>

<?php if (!empty($mesasbusy)) { ?>
    <div class="container">
        <h1 class="h1-legenda">
            <div>Mesa Ocupadas</div>
            <ul class="legenda">
                <li><i></i>Aberto</li>
                <li><i></i>Em preparo</li>
                <li><i></i>Preparo finalizado</li>
                <li><i></i>Entregue a mesa</li>
            </ul>
        </h1>
        <div class="mesas">
            <?php foreach ($mesasbusy as $id => $v) { ?>
                <a href="<?= URL . 'pedido/?id=' . $v->idpedido ?>" class="busy-<?= $v->status_id ?>">
                    <img src="<?= URL . '/public/img/table.png' ?>"/>
                    <span>
                    <h4>Mesa <?= $v->numero ?></h4>
                    <h5><?= $v->descricao ?></h5>
                </span>
                </a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
</div>
