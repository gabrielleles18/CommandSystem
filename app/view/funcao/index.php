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
    <div class="box">
        <h3>Total de funcao: <?php echo $amount_of_funcao; ?></h3>
        <!--        <h3>Total de funcao (via AJAX)</h3>-->
        <!--        <div id="javascript-ajax-result-box"></div>-->
        <!--        <div>-->
        <!--            <button id="javascript-ajax-button">Clique aqui para obter a quantidade de funcao via Ajax (será exibido em # javascript-ajax-result-box acima)</button>-->
        <!--        </div>-->
        <!--        <h3>Lista de funcao (dados do model)</h3>-->
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Nome</td>
                <td>Status</td>
                <td>Excluir</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funcoes as $item) { ?>
                <tr>
                    <td><?php if (isset($item->nome)) echo $item->nome; ?></td>
                    <td><?php if (isset($item->status)) echo $item->status; ?></td>
                    <td>
                        <a href="<?php echo URL . 'funcao/delete/' . $item->idfuncao; ?>">Excluir</a>
                    </td>
                    <td>
                        <a href="<?php echo URL . 'funcao/edit/' . $item->idfuncao; ?>">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
