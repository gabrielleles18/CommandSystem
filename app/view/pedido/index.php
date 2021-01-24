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
    <div class="box"></div>
</div>
</div>
