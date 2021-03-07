<?php

use Mini\Controller\Index;

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
    <h1>Funcionários <i class="fas fa-plus icon"></i></h1>
    <div class="box">
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
                    <?php
                    $status = '';
                    if (isset($funcionario->status)) {
                        if ($funcionario->status == 1) {
                            $status = "<td style='color: green'>Ativo</td>";
                        } elseif ($funcionario->status == 0) {
                            $status = "<td style='color: red'>Inativo</td>";
                        }
                    }
                    ?>
                    <?= $status ?>
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

    <div class="box form">
        <form action="<?= URL; ?>funcionarios/add" method="POST" class="form">
            <fieldset>
                <legend>Adicionar Funcionário</legend>
                <div class="form-row">
                    <div class="col-3 col-in">
                        <label>Nome</label>
                        <input type="text" name="nome" value="" required/>
                    </div>
                    <div class="col-3 col-in">
                        <label>CPF</label>
                        <input type="text" name="cpf" class="form-control cpf-mask"  placeholder="Ex.: 000.000.000-00" value="" required/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Telefone</label>
                        <input type="text" name="telefone" placeholder="Ex.: (00) 0000-0000" class="phone-ddd-mask" value="" required/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-3 col-in">
                        <label>Nascimento</label>
                        <input type="date" name="data_nasc" required/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Função</label>
                        <select name="funcao_idfuncao" required>
                            <option selected value=""></option>
                            <?php foreach ($funcao as $v) { ?>
                                <option value="<?= $v->idfuncao ?>"><?= $v->nome ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3 col-in">
                        <label>Status</label>
                        <select name="status" required>
                            <option selected value=""></option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-3 col-in">
                        <label>Usuário</label>
                        <input type="text" name="usuario" value="" required/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Senha</label>
                        <input type="password" name="senha" value="" required/>
                    </div>
                    <div class="col-3 col-in">
                        <label>Comfirmar Senha</label>
                        <input type="password" name="senha_comfirm" value="" required/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1 col-in">
                        <input type="submit" name="submit_add_funcionario" value="Enviar"/>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</div>
