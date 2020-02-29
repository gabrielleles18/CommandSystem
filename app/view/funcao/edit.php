<div class="container">
    <h1>Editar um funcao</h1>
    <!--    <h2>Você está na View: application/view/funcao/edit.php (tudo nesta tela vem desse arquivo)</h2>-->
    <!-- add song form -->
    <div class="box">
        <form action="<?php echo URL; ?>funcao/update" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nome</label>
                    <input autofocus type="text" name="nome"
                           value="<?= $funcao->nome ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <select name="status">
                        <option value="1" <?= ($funcao->status == 1) ? 'selected' : '' ?>>Ativo</option>
                        <option value="0" <?= ($funcao->status == 0) ? 'selected' : '' ?>>Inativo</option>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <input type="hidden" name="funcao_id"
                           value="<?= $funcao->idfuncao; ?>"/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_update_funcao" value="Editar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

