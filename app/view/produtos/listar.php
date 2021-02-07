<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => '#',
        'text' => 'Fazer Pedido'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container produtos">
    <div class="produtos">
        <h1>Produtos</h1>
        <div class="box">
            <ul class="itens">
                <?php
                if (!empty($produtos_by_cat)) {
                    foreach ($produtos_by_cat as $id => $categorias) { ?>
                        <?php foreach ($categorias as $value) { ?>
                            <li class="item itens-<?= $id ?>">
                                <?php
                                if (!empty($value['image']))
                                    $url_image = URL . 'public/midias/' . $value['image'];
                                else
                                    $url_image = URL . 'public/img/notfound.png';
                                ?>
                                <img src="<?= $url_image ?>"
                                     alt="">
                                <div class="conteudo">
                                    <hgroup>
                                        <h2><?= $value['nome'] ?></h2>
                                        <p><?= $value['descricao'] ?></p>
                                    </hgroup>
                                    <div class="preco-carrinho">
                                        <h5>R$ <?= $value['preco'] ?></h5>
                                        <a href="" class="carrinho"
                                           data-id="<?= $value['idproduto'] ?>"
                                           data-src="<?= URL ?>/public/img/pizza.png"
                                           data-nome="<?= $value['nome'] ?>"
                                           data-preco="<?= $value['preco'] ?>"
                                           data-descricao="<?= $value['descricao'] ?>"
                                           data-image="<?= $url_image ?>"
                                           data-qt="1"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                 fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php }
                } else {
                    echo "<h3>Nenhum produto encontrado!</h3>";
                } ?>
            </ul>
        </div>
    </div>
</div>
