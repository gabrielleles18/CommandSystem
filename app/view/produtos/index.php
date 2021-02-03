<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/produtos',
        'text' => 'Produtos'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Produtos</h1>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Preço</td>
                <td>Categoria</td>
                <td>Tamanho</td>
                <td>Uni. medida</td>
                <td>Açõess</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($produtos as $id => $v) {
                ?>
                <tr>
                    <td><?= ++$id ?></td>
                    <td><?php if (isset($v->nome)) echo $v->nome; ?></td>
                    <td>R$: <?php if (isset($v->preco)) echo $v->preco; ?></td>
                    <td><?php if (isset($v->categoria_idcat)) echo $Produto->getForenkey('categoria', 'idcat', $v->categoria_idcat) ?></td>
                    <td><?php if (isset($v->tamanho)) echo $v->tamanho ?></td>
                    <td><?php if (isset($v->unidmed_idunid)) echo $Produto->getForenkey('unidmed', 'idunid', $v->unidmed_idunid) ?></td>
                    <td>
                        <a href="<?= URL . 'produtos/delete/' . $v->idproduto; ?>" title="Deletar">
                            <i class="far fa-trash-alt button button-delete"></i>
                        </a>
                        <a href="<?= URL . 'produtos/edit/' . $v->idproduto; ?>" title="Excluir">
                            <i class="fas fa-pencil-alt button button-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="box">
        <form action="<?= URL; ?>produtos/add" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Preço</label>
                    <input type="text" name="preco" value=""/>
                </div>
                <div class="col-3 col-in">
                    <label>Tamanho</label>
                    <input type="text" name="tamanho" value=""/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Unidade Medida</label>
                    <select name="unidmed_idunid">
                        <option selected value=""> -- select an option --</option>
                        <?php foreach ($unidade as $v) { ?>
                            <option value="<?= $v->idunid ?>"><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <label>Categoria</label>
                    <select name="categoria_idcat">
                        <option selected value=""> -- select an option --</option>
                        <?php foreach ($categoria as $v) { ?>
                            <option value="<?= $v->idcat ?>"><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <label>Descrição</label>
                    <textarea name="descricao" rows="1"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="col-3 col-in">
                    <input type="hidden" name="borda_idborda" value="0"/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_add_produto" value="Enviar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
