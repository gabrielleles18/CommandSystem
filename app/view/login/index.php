<?php ?>

<div class="box-login">
    <form action="<?= URL ?>login/verify" method="POST">
        <input type="text" name="usuario" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="submit" value="Login" id="submit" name="verify_usuario">
    </form>
</div>
