<div class="container">
    <h1>Funcionarios</h1>
    <h2>Você está na View: application/view/funcionarios/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- add funcionario form -->
    <div class="box">
        <h3>Adicionar um funcionario</h3>
        <form action="<?php echo URL; ?>funcionarios/add" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" value="" required/>

            <label>CPF</label>
            <input type="text" name="cpf" value=""/>

            <label>Telefone</label>
            <input type="text" name="telefone" value=""/>

            <label>Nascimento</label>
            <input type="text" name="data_nasc" value=""/>

            <label>Usuário</label>
            <input type="text" name="usuario" value=""/>

            <label>Senha</label>
            <input type="text" name="senha" value=""/>

            <label>Função</label>
            <select name="funcao_idfuncao">
                <option value="1">Garçom</option>
                <option value="0">Caixa</option>
            </select>

            <label>Status</label>
            <select name="status">
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>

            <input type="submit" name="submit_add_funcionario" value="Enviar"/>
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Total de funcioanrios: <?php echo $amount_of_funcionarios; ?></h3>
        <!--        <h3>Total de funcioanrios (via AJAX)</h3>-->
        <!--        <div id="javascript-ajax-result-box"></div>-->
        <!--        <div>-->
        <!--            <button id="javascript-ajax-button">Clique aqui para obter a quantidade de funcioanrios via Ajax (será exibido em # javascript-ajax-result-box acima)</button>-->
        <!--        </div>-->
        <!--        <h3>Lista de funcioanrios (dados do model)</h3>-->
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Função</td>
                <td>Status</td>
                <td>Excluir</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funcionarios as $funcionario) { ?>
                <tr>
                    <td><?php if (isset($funcionario->nome)) echo htmlspecialchars($funcionario->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($funcionario->cpf)) echo htmlspecialchars($funcionario->cpf, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($funcionario->telefone)) echo htmlspecialchars($funcionario->telefone, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($funcionario->funcao)) echo htmlspecialchars($funcionario->funcao, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($funcionario->status)) echo htmlspecialchars($funcionario->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <a href="<?php echo URL . 'funcionarios/delete/' . htmlspecialchars($funcionario->idfuncionario, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a>
                    </td>
                    <td>
                        <a href="<?php echo URL . 'funcionarios/edit/' . htmlspecialchars($funcionario->idfuncionario, ENT_QUOTES, 'UTF-8'); ?>">Editar</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>