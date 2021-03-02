<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/produtos',
        'text' => 'Produtos'
    ],
    [
        'url' => '#',
        'text' => $produto->nome
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Editar Produto</h1>
    <div class="box">
        <form action="<?php echo URL; ?>produtos/update" method="POST" class="form" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-2 col-in">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?= $produto->nome; ?>" required/>
                </div>
                <div class="col-2 col-in">
                    <label>Preço</label>
                    <input type="text" name="preco" value="<?= $produto->preco; ?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Tamanho</label>
                    <input type="text" name="tamanho" value="<?= $produto->tamanho; ?>"/>
                </div>
                <div class="col-3 col-in">
                    <label>Unidade Medida</label>
                    <select name="unidmed_idunid">
                        <option selected value=""> -- select an option --</option>
                        <?php foreach ($unidade as $v) { ?>
                            <option value="<?= $v->idunid ?>" <?= ($produto->unidmed_idunid == $v->idunid) ? 'selected' : '' ?>><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <label>Categoria</label>
                    <select name="categoria_idcat">
                        <option selected value=""> -- select an option --</option>
                        <?php foreach ($categoria as $v) { ?>
                            <option value="<?= $v->idcat ?>" <?= ($produto->categoria_idcat == $v->idcat) ? 'selected' : '' ?>><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Descrição</label>
                    <textarea name="descricao" rows="2" ><?= $produto->descricao?></textarea>
                </div>
                <div class="col-3 col-in">
                    <label>Imagem</label>
                    <input type="file" name="arquivo" accept="image/*" value="<?= $produto->image?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-2 col-in">
                    <input type="hidden" name="produto_id"
                           value="<?= $produto->idproduto; ?>"/>
                </div>
                <div class="form-row">
                    <div class="col-2 col-in">
                        <input type="hidden" name="borda_idborda" value="0"/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_update_produto" value="Atualizar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
