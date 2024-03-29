<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/estatistica',
        'text' => 'Estatísticas'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container estatistica ">
    <h1>Estatísticas Geral</h1>
    <div class="box">

<!--        <section class="filtro">-->
<!--            <form method="post" action="--><?//= URL ?><!--estatistica">-->
<!--                <div class="caixa">-->
<!--                    <label for="inicio">Início</label>-->
<!--                    <input type="date" id="inicio" name="inicio"/>-->
<!--                </div>-->
<!--                <div class="caixa">-->
<!--                    <label for="fim">Fim</label>-->
<!--                    <input type="date" id="fim" name="fim"/>-->
<!--                </div>-->
<!--                <button type="submit" name="submit_estatistic" class="button">Filtrar</button>-->
<!--            </form>-->
<!--        </section>-->

        <?php
        if (!empty($pedidobyuser)) { ?>
            <section class="funcionario">
                <?php foreach ($pedidobyuser as $value) { ?>
                    <div class="block">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>
                        <h3><?= $value->nome ?></h3>
                        <h4><?= !empty($value->idpedido) ? $value->total_pedidos : '0' ?> Pedidos</h4>
                    </span>
                    </div>
                <?php } ?>
            </section>
        <?php }
        if (!empty($produto)) {
            ?>
            <section class="produtos">
                <?php foreach ($produto as $value) { ?>
                    <div class="block">
                        <div class="icon">
                            <i class="fas fa-pizza-slice"></i>
                        </div>
                        <span>
                        <h3><?= $value->nome ?></h3>
                        <h4><?= $value->soma_prod ?></h4>
                        <div class="linha">
                            <div class="progress"
                                 style="width:<?= intval(($value->soma_prod * 100) / $total) ?>%"></div>
                        </div>
                        <div class="text"><?= intval(($value->soma_prod * 100) / $total) ?>% Pediram <?= $value->nome ?></div>
                    </span>
                    </div>
                <?php } ?>
            </section>
        <?php } ?>
        <section class="total">
            <?php if (!empty($total)) { ?>
                <div class="block">
                <span>
                    <h3><?= $total ?></h3>
                    <h4>Produtos Vendidos</h4>
                </span>
                    <i class="fas fa-cart-plus"></i>
                </div>
            <?php }
            if (!empty($totalpedido->total_pedido)) { ?>
                <div class="block">
                <span>
                    <h3><?= $totalpedido->total_pedido ?></h3>
                    <h4>Pedidos Realizados</h4>
                </span>
                    <i class="fas fa-clipboard"></i>
                </div>
            <?php }
            if (!empty($totalvalorpedido->total)) { ?>
                <div class="block">
                <span>
                    <h3><b class="dolar">R$</b> <?= number_format($totalvalorpedido->total, 2, ',', '') ?></h3>
                    <h4>Em vendas</h4>
                </span>
                    <i class="fas fa-dollar-sign"></i>
                </div>
            <?php } ?>
        </section>
    </div>
</div>
</div>
