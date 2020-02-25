<div class="container">
    <h1>Funções</h1>
    <h2>Você está na View: application/view/funcao/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- add funcao form -->
    <div class="box">
        <h3>Adicionar um função</h3>
        <form action="<?php echo URL; ?>funcao/add" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" value="" required />
            <label>Status</label>
            <input type="text" name="status" value="" />
            <input type="submit" name="submit_add_funcao" value="Enviar" />
        </form>
    </div>
    <!-- main content output -->
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
                    <td><?php if (isset($item->nome)) echo htmlspecialchars($item->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($item->status)) echo htmlspecialchars($item->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'funcao/delete/' . htmlspecialchars($item->idfuncao, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'funcao/edit/' . htmlspecialchars($item->idfuncao, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>