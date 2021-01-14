<link href="<?= URL; ?>css/listar_produtos.css" rel="stylesheet">
<div class="container-sidebar">
    <div class="container">
        <h1>Produtos</h1>
        <div class="box">
            <?php foreach ($produtos_by_cat as $id => $categorias) { ?>
                <ul class="itens itens-<?= $id ?>">
                    <?php foreach ($categorias as $value) { ?>
                        <li class="item">
                            <img src="<?= URL ?>/public/img/pizza.png" alt="">
                            <div class="conteudo">
                                <h2><?= $value['nome'] ?></h2>
                                <p><?= $value['descricao'] ?></p>
                                <h5>R$ <?= $value['preco'] ?></h5>
                                <a href="" class="carrinho"
                                   data-id="<?= $value['idproduto'] ?>"
                                   data-src="<?= URL ?>/public/img/pizza.png"
                                   data-nome="<?= $value['nome'] ?>"
                                   data-preco="<?= $value['preco'] ?>"
                                   data-descricao="<?= $value['descricao'] ?>"
                                   data-qt="1"
                                ><i class="icon-carrinho"></i>Adicionar</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="sidebar-prod">
    </div>
</div>
</div>
