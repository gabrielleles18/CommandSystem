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
            <a href="<?= URL . 'pedido/?id=' . $v->idmesa?>">
                <h6>Mesa <?= $v->numero ?></h6>
                <i class="icon"></i>
            </a>
        <?php } ?>
    </div>
</div>

<div class="container">
    <h1>Mesa Ocupadas</h1>
    <div class="mesas">
        <?php foreach ($mesasbusy as $id => $v) { ?>
            <a href="<?= URL . 'pedido/?id=' . $v->idmesa?>">
                <h6>Mesa <?= $v->numero ?></h6>
                <i class="icon iconbusy"></i>
            </a>
        <?php } ?>
    </div>
</div>
</div>
