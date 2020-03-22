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
                        <ul>
                            <?php foreach ($categorias as $value) { ?>
                                <li>
                                    <img src="<?= URL ?>/public/img/pizza.png" alt="">
                                    <div class="conteudo">
                                        <div class="top">
                                            <h2><?= $value['nome'] ?></h2>
                                            <h5><?= $value['preco'] ?></h5>
                                        </div>
                                        <div class="bottom">
                                            <p><?= $value['descricao'] ?></p>
                                            <div class="botoes">
                                                <a href=""><i class="icon-carrinho"></i>Adicionar</a>
                                                <a href=""><i class="icon-meia"></i>Meio a Meio</a>
                                            </div>
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
