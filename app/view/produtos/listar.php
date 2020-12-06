<link href="<?= URL; ?>css/listar_produtos.css" rel="stylesheet">
<div class="container-sidebar">
    <div class="container">
        <h1>Produtos</h1>
        <div class="box">
            <?php foreach ($produtos_by_cat as $id => $categorias) { ?>
                <ul class="list-produtos">
                    <li>
                        <div class="cat-icon">
                            <h1 class="cat"><?= $id ?></h1>
                            <i class="icon-arrow-down"></i>
                        </div>
                        <ul class="itens">
                            <?php foreach ($categorias as $value) { ?>
                                <li>
                                    <img src="<?= URL ?>/public/img/pizza.png" alt="" data-src="<?= URL ?>/public/img/pizza.png">
                                    <div class="conteudo">
                                        <div class="top">
                                            <h2 data-nome="<?= $value['nome'] ?>"><?= $value['nome'] ?></h2>
                                            <h5 data-preco="<?= $value['preco'] ?>"><?= $value['preco'] ?></h5>
                                        </div>
                                        <div class="bottom">
                                            <p data-descricao="<?= $value['descricao'] ?>"><?= $value['descricao'] ?></p>
                                            <div class="opcoes"></div>
                                            <a href="" class="carrinho"><i class="icon-carrinho"></i>Adicionar</a>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <div class="sidebar-prod">
        Intens do carinho
    </div>
</div>
</div>
