<?php ?>

<div class="box-login">
    <form action="<?= URL ?>login/verify" method="POST">
        <div class="icon-input"><i class="fas fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuário" required/>
        </div>
        <div class="icon-input"><i class="fas fa-key"></i>
            <input type="password" name="senha" placeholder="Senha" required/>
        </div>
        <input type="submit" value="Login" id="submit" name="verify_usuario">
    </form>
</div>
<script src="https://kit.fontawesome.com/2909cd6cac.js" crossorigin="anonymous"></script>
