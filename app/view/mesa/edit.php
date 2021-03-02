<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/mesa',
        'text' => 'Mesas'
    ],
    [
        'url' => '#',
        'text' => 'Mesa:' . $mesa->numero
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Editar um Mesa</h1>
    <div class="box">
        <form action="<?php echo URL; ?>mesa/update" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Numero</label>
                    <input type="text" name="numero" value="<?= $mesa->numero ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Descrição</label>
                    <textarea name="descricao" rows="1"><?= $mesa->descricao ?></textarea>
                </div>
                <div class="col-3 col-in">
                    <label>Status</label>
                    <select name="status">
                        <option value="1" <?= ($mesa->status == 1) ? 'selected' : '' ?>>Desculpado</option>
                        <option value="0" <?= ($mesa->status == 0) ? 'selected' : '' ?>>Oculpado</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <input type="hidden" name="mesa_id"
                           value="<?= $mesa->idmesa; ?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_update_mesa" value="Editar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

