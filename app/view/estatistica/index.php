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
    <div class="box">
        <section class="filtro">
            <form method="post" action="">
                <div class="caixa">
                    <label for="inicio">Início</label>
                    <input type="date" id="inicio" name="inicio"/>
                </div>
                <div class="caixa">
                    <label for="fim">Fim</label>
                    <input type="date" id="fim" name="fim"/>
                </div>
                <button type="submit" class="button">Filtrar</button>
            </form>
        </section>
        <section class="funcionario">
            <?php foreach ($pedidobyuser as $value) { ?>
                <div class="block">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <span>
                        <h3><?= $value->nome ?></h3>
                        <h4><?= $value->total_pedidos ?> Pedidos</h4>
                    </span>
                </div>
            <?php } ?>
        </section>
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
        <section class="total">
            <div class="block">
                <span>
                    <h3><?= $total ?></h3>
                    <h4>Produtos Vendidos</h4>
                </span>
                <i class="fas fa-cart-plus"></i>
            </div>
            <div class="block">
                <span>
                    <h3><?= $totalpedido->total_pedido ?></h3>
                    <h4>Pedidos Realizados</h4>
                </span>
                <i class="fas fa-clipboard"></i>
            </div>
            <div class="block">
                <span>
                    <h3><b class="dolar">R$</b> <?= number_format($totalvalorpedido->total, 2, ',', '') ?></h3>
                    <h4>Em vendas</h4>
                </span>
                <i class="fas fa-dollar-sign"></i>
            </div>
        </section>
    </div>
</div>
</div>
