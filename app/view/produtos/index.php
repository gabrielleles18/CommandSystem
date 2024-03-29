<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([['url' => URL, 'text' => 'Home'], ['url' => URL . '/produtos', 'text' => 'Produtos']]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Produtos <i class="fas fa-plus icon"></i></h1>
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
                <td>Disponibilidade</td>
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
                    <?php
                    $disponibilidade = '';
                    if (isset($v->disponibilidade)) {
                        if ($v->disponibilidade == 1) {
                            $disponibilidade = "<td style='color: green'>Disponível</td>";
                        } elseif ($v->disponibilidade == 0) {
                            $disponibilidade = "<td style='color: red'>Indisponível</td>";
                        }
                    }
                    ?>
                    <?= $disponibilidade ?>
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

    <div class="box form">
        <form action="<?= URL; ?>produtos/add" method="POST" class="form" enctype="multipart/form-data">
            <fieldset>
                <legend>Adicionar Produto</legend>
                <div class="form-row">
                    <div class="col-2 col-in">
                        <label>Nome</label>
                        <input type="text" name="nome" value="" required/>
                    </div>
                    <div class="col-2 col-in">
                        <label>Preço</label>
                        <input type="text" name="preco" value="" placeholder="00.00"/>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-3 col-in">
                        <label>Tamanho</label>
                        <input type="text" name="tamanho" value=""/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Unidade Medida</label>
                        <select name="unidmed_idunid">
                            <option selected value=""></option>
                            <?php foreach ($unidade as $v) { ?>
                                <option value="<?= $v->idunid ?>"><?= $v->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3 col-in">
                        <label>Categoria</label>
                        <select name="categoria_idcat">
                            <option selected value=""></option>
                            <?php foreach ($categoria as $v) { ?>
                                <option value="<?= $v->idcat ?>"><?= $v->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-3 col-in">
                        <label>Descrição</label>
                        <textarea name="descricao" rows="2"></textarea>
                    </div>
                    <div class="col-3 col-in">
                        <label>Imagem</label>
                        <input type="file" name="arquivo" accept="image/*"/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Disponibilidade</label>
                        <select name="disponibilidade">
                            <option value="1">Disponível</option>
                            <option value="0">Indisponível</option>
                        </select>
                    </div>
                    <div class="col-3 col-in">
                        <input type="hidden" name="borda_idborda" value="0"/>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-1 col-in">
                        <input type="submit" name="submit_add_produto" value="Enviar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>
