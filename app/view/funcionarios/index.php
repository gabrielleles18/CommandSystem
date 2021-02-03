<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => URL . '/funcionarios',
        'text' => 'Funcionarios'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <h1>Funcionarios</h1>
    <div class="box">
        <!--        <h3>Total de funcioanrios: --><? //= $amount_of_funcionarios; ?><!--</h3>-->
        <table>
            <thead>
            <tr>
                <td>#</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Telefone</td>
                <td>Função</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($funcionarios as $id => $funcionario) { ?>
                <tr>
                    <td><?= ++$id ?></td>
                    <td><?php if (isset($funcionario->nome)) echo $funcionario->nome; ?></td>
                    <td><?php if (isset($funcionario->cpf)) echo $funcionario->cpf; ?></td>
                    <td><?php if (isset($funcionario->telefone)) echo $funcionario->telefone; ?></td>
                    <td><?php if (isset($funcionario->funcao)) echo $funcionario->funcao; ?></td>
                    <td><?php if (isset($funcionario->status)) echo $funcionario->status; ?></td>
                    <td>
                        <a href="<?= URL . 'funcionarios/delete/' . $funcionario->idfuncionario; ?>" title="Deletar">
                            <i class="far fa-trash-alt button button-delete"></i></a>
                        <a href="<?= URL . 'funcionarios/edit/' . $funcionario->idfuncionario; ?>" title="Editar">
                            <i class="fas fa-pencil-alt button button-edit"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="box">
        <form action="<?= URL; ?>funcionarios/add" method="POST" class="form">
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nome</label>
                    <input type="text" name="nome" value="" required class="form-control"/>
                </div>
                <div class="col-3 col-in">
                    <label>CPF</label>
                    <input type="text" name="cpf" value=""/>
                </div>
                <div class="col-3 col-in">
                    <label>Telefone</label>
                    <input type="text" name="telefone" value=""/>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Nascimento</label>
                    <input type="text" name="data_nasc" value=""/>
                </div>
                <div class="col-3 col-in">
                    <label>Função</label>
                    <select name="funcao_idfuncao">
                        <option selected value=""> -- select an option --</option>
                        <?php foreach ($funcao as $v) { ?>
                            <option value="<?= $v->idfuncao ?>"><?= $v->nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-3 col-in">
                    <label>Status</label>
                    <select name="status">
                        <option selected value=""> -- select an option --</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-3 col-in">
                    <label>Usuário</label>
                    <input type="text" name="usuario" value=""/>
                </div>
                <div class="col-3 col-in">
                    <label>Senha</label>
                    <input type="text" name="senha" value=""/>
                </div>
                <!--                <div class="col-3 col-in">-->
                <!--                    <label>Comfirmar Senha</label>-->
                <!--                    <input type="text" value=""/>-->
                <!--                </div>-->
            </div>
            <div class="form-row">
                <div class="col-1 col-in">
                    <input type="submit" name="submit_add_funcionario" value="Enviar"/>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
