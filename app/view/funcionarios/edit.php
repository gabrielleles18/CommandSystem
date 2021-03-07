<?php

use Mini\Controller\Index;

$breadcrumb = Index::gerateBreadcrumb([['url' => URL, 'text' => 'Home'], ['url' => URL . '/funcionarios', 'text' => 'Funcionarios'], ['url' => '#', 'text' => $funcionario->nome]]);
?>
<?= $breadcrumb ?>
<div class="container">
    <!--    <h2>Você está na View: application/view/funcionarios/edit.php (tudo nesta tela vem desse arquivo)</h2>-->
    <h1>Editar Funcionário</h1>
    <div class="box">
        <form action="<?= URL; ?>funcionarios/update" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nome</label>
                    <input autofocus type="text" name="nome"
                           value="<?= $funcionario->nome; ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <label>CPF</label>
                    <input type="text" name="cpf"
                           value="<?= $funcionario->cpf; ?>" required id="cpf"/>
                </div>
                <div class="col-3 col-in">
                    <label>Telefone</label>
                    <input type="text" name="telefone"
                           value="<?= $funcionario->telefone; ?>" required id="telefone"/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nascimento</label>
                    <input type="text" name="data_nasc"
                           value="<?= $funcionario->data_nasc; ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Função</label>
                    <select name="funcao_idfuncao">
                        <?php foreach($funcao as $v) { ?>
                            <option value="<?= $v->idfuncao ?>" <?= ($funcionario->funcao_idfuncao == $v->idfuncao) ? 'selected' : '' ?> ><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <label>Status</label>
                    <select name="status">
                        <option value="1" <?= ($funcionario->status == 1) ? 'selected' : '' ?>>Ativo</option>
                        <option value="0" <?= ($funcionario->status == 0) ? 'selected' : '' ?>>Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Usuário</label>
                    <input type="text" name="usuario"
                           value="<?= $funcionario->usuario; ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Senha</label>
                    <input type="password" name="senha"
                           value="<?= $funcionario->senha; ?>" required/>
                </div>
                <div class="col-3 col-in">
                    <label>Confirmar Senha</label>
                    <input type="password" name="confirmar_senha"
                           value=""/>
                </div>
                <input type="hidden" name="funcionario_id"
                       value="<?= $funcionario->idfuncionario; ?>"/>
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_update_funcionario" value="Editar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

