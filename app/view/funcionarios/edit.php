<div class="container">
    <h2>Você está na View: application/view/funcionarios/edit.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- add song form -->
    <div>
        <h3>Editar um funcioanrio</h3>
        <form action="<?php echo URL; ?>funcionarios/update" method="POST">
            <label>Nome</label>
            <input autofocus type="text" name="nome"
                   value="<?php echo htmlspecialchars($funcionario->nome, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>CPF</label>
            <input type="text" name="cpf"
                   value="<?php echo htmlspecialchars($funcionario->cpf, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>Telefone</label>
            <input type="text" name="telefone"
                   value="<?php echo htmlspecialchars($funcionario->telefone, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>Nascimento</label>
            <input type="text" name="data_nasc"
                   value="<?php echo htmlspecialchars($funcionario->data_nasc, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>Usuário</label>
            <input type="text" name="usuario"
                   value="<?php echo htmlspecialchars($funcionario->usuario, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>Senha</label>
            <input type="text" name="senha"
                   value="<?php echo htmlspecialchars($funcionario->senha, ENT_QUOTES, 'UTF-8'); ?>" required/>

            <label>Função</label>
            <select name="funcao_idfuncao">
                <option value="1">Garçom</option>
                <option value="3">Caixa</option>
            </select>

            <label>Status</label>
            <select name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <input type="hidden" name="funcionario_id"
                   value="<?php echo htmlspecialchars($funcionario->idfuncionario, ENT_QUOTES, 'UTF-8'); ?>"/>

            <input type="submit" name="submit_update_funcionario" value="Editar"/>
        </form>
    </div>
</div>
</div>

