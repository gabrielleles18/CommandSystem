<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([['url' => URL, 'text' => 'Home'], ['url' => URL . '/mesa', 'text' => 'Mesas']]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Mesas <i class="fas fa-plus icon"></i></h1>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>#</td>
                <td>Numero</td>
                <td>Descrição</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($mesas as $id => $item) { ?>
                <tr>
                    <td><?= ++$id ?></td>
                    <td><?php if (isset($item->numero)) echo $item->numero; ?></td>
                    <td><?php if (isset($item->descricao)) echo $item->descricao; ?></td>
                    <?php
                    $status = '';
                    if (isset($item->status)) {
                        if ($item->status == 1) {
                            $status = "<td style='color: green'>Desculpado</td>";
                        } elseif ($item->status == 0) {
                            $status = "<td style='color: red'>Oculpado</td>";
                        }
                    }
                    ?>
                    <?= $status ?>
                    <td>
                        <a href="<?php echo URL . 'mesa/delete/' . $item->idmesa; ?>" title="Deletar">
                            <i class="far fa-trash-alt button button-delete"></i>
                        </a>
                        <a href="<?php echo URL . 'mesa/edit/' . $item->idmesa; ?>" title="Excluir">
                            <i class="fas fa-pencil-alt button button-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="box form">
        <form action="<?php echo URL; ?>mesa/add" method="POST" class="form">
            <fieldset>
                <legend>Adicionar Messa</legend>
                <div class="form-row">
                    <div class="col-2 col-in">
                        <label>Numero</label>
                        <input type="text" name="numero" value="" required/>
                    </div>
                    <div class="col-2 col-in">
                        <label>Status</label>
                        <select name="status">
                            <option value="1">Desculpado</option>
                            <option value="0">Oculpado</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-2 col-in">
                        <label>Descrição</label>
                        <textarea name="descricao" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1 col-in">
                        <input type="submit" name="submit_add_mesa" value="Enviar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>
