<div class="container">
    <h2>Você está na View: application/view/funcao/edit.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- add song form -->
    <div>
        <h3>Editar um funcao</h3>
        <form action="<?php echo URL; ?>funcao/update" method="POST">
            <label>Nome</label>
            <input autofocus type="text" name="nome" value="<?php echo htmlspecialchars($funcao->nome, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Status</label>
            <input type="text" name="status" value="<?php echo htmlspecialchars($funcao->status, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="funcao_id" value="<?php echo htmlspecialchars($funcao->idfuncao, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_funcao" value="Editar" />
        </form>
    </div>
</div>
</div>

