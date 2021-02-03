<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/funcao',
        'text' => 'Função'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Funções</h1>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funcoes as $id => $item) { ?>
                <tr>
                    <td><?= ++$id ?></td>
                    <td><?php if (isset($item->nome)) echo $item->nome; ?></td>
                    <td><?php if (isset($item->status)) echo $item->status; ?></td>
                    <td>
                        <a href="<?php echo URL . 'funcao/delete/' . $item->idfuncao; ?>" title="Deletar">
                            <i class="far fa-trash-alt button button-delete"></i>
                        </a>
                        <a href="<?php echo URL . 'funcao/edit/' . $item->idfuncao; ?>" title="Excluir">
                            <i class="fas fa-pencil-alt button button-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="box">
        <form action="<?php echo URL; ?>funcao/add" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Status</label>
                    <select name="status">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_add_funcao" value="Enviar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
