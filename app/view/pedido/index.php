<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([['url' => URL, 'text' => 'Home'], ['url' => URL . '#', 'text' => 'Pedido'], ['url' => URL . '#', 'text' => 'Mesa ' . $mesa->numero]]);

$user = json_decode($_COOKIE['login']);
$class = '';
if (!empty($user->funcao_idfuncao) && $user->funcao_idfuncao == 2) {
    $class = 'hidden';
}
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Pedido</h1>
    <div class="box">
        <div class="busy">
            <img src="<?= URL . '/public/img/table.png' ?>"/>
            <span>
                <h4>Mesa <?= $mesa->numero ?></h4>
                <h5>Mesa <?= $mesa->descricao ?></h5>
            </span>
        </div>
        <ul class="pedido-item">
            <form method="post" action="<?= URL ?>pedido/updateStatus">

                <input type="hidden" name="idpedido" value="<?= $pedido->idpedido ?>"/>
                <input type="hidden" name="mesa_idmesa" value="<?= $pedido->mesa_idmesa ?>"/>
                <li>Status
                    <select name="status">
                        <?php foreach ($status as $value) { ?>
                            <option value="<?= $value->numero ?>"
                                <?= ($pedido->status_id == $value->id) ? 'selected' : '' ?>>
                                <?= $value->slug ?>
                            </option>
                        <?php } ?>
                    </select>
                </li>
                <li>Detalhes <span><?= $pedido->observacoes ?></span></li>
                <li>Data/Hora <span><?= $pedido->data_pedido ?></span></li>
                <li>Valor Total <span><?= $pedido->valor ?></span></li>
                <input type="submit" value="Aterar Status" name="alter_status"/>

            </form>
        </ul>

        <form action="<?= URL ?>pedido/updateqt" method="POST" class="produtos">
            <fieldset>
                <legend>Itens do Pedido</legend>
                <!--                <input type="hidden" name="mesa_id" value="--><? //= $_GET['id'] ?><!--"/>-->

                <?php
                $total = 0;
                foreach ($proutdutos as $id => $value) {
                    $total = $total + ($value['qt_prod'] * $value['preco']);

                    if (!empty($value['image'])) $url_image = URL . 'public/midias/' . $value['image']; else
                        $url_image = URL . 'public/img/notfound.png';
                    ?>
                    <?php if ($value['qt_prod'] > 0) { ?>
                        <li>
                            <input type="hidden" name="idpedido-<?= $id ?>" value="<?= $value['idpedido'] ?>"/>
                            <input type="hidden" name="idproduto-<?= $id ?>" value="<?= $value['idproduto'] ?>"/>
                            <img src="<?= $url_image ?>" alt="">
                            <div class="center">
                                <hgroup>
                                    <h5 class="title"><?= $value['nome'] ?></h5>
                                    <h6 class="des"><?= $value['descricao'] ?></h6>
                                </hgroup>
                                <div class="quantidade">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor"
                                         class="bi bi-dash <?= $class ?>"
                                         viewBox="0 0 16 16">
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                    </svg>
                                    <input type="text" name="qt_prod-<?= $id ?>" value="<?= $value['qt_prod'] ?>"/>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                         fill="currentColor" class="bi bi-plus <?= $class ?>" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="right">
                                <div class="preco">R$ <?= ($value['qt_prod'] * $value['preco']) ?></div>
                            </div>
                        </li>
                    <?php }
                } ?>
                <h5 class="total">Total: R$ <?= $total ?></h5>
                <div class="buttons">
                    <button class="finalizar <?= $class ?>" type="submit" name="submit_updateqt">Salvar</button>
                    <a class="finalizar <?= $class ?>" type="submit"
                       href="<?= URL ?>produtos/listar?id=<?= $mesa->idmesa ?>&id_ped=<?= $pedido->idpedido ?>">Adicionar
                        Produto</a>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>
