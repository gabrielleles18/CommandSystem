<div class="sidebar">
    <div class="logo">Logo</div>
    <ul>
        <li><i class="icon-home"></i><a href="<?= URL; ?>">Home</a></li>
        <li><i class="icon-mesa"></i><a href="<?= URL; ?>funcionarios">Funcionarios</a></li>
        <li><i class="icon-mesa"></i><a href="<?= URL; ?>funcao">Função</a></li>
        <li><i class="icon-history"></i><a href="<?= URL; ?>produtos">Produtos</a></li>
        <li><i class="icon-history"></i><a href="<?= URL; ?>funcao">Função</a></li>
        <li><i class="icon-history"></i><a href="<?= URL; ?>mesa">Mesa</a></li>
        <li><i class="icon-history"></i><a href="<?= URL; ?>produtos/listar">Fazer Pedido</a></li>
    </ul>
</div>
</main>


<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?= URL; ?>";
</script>
<script type="script" src="<?= URL ?>public/dist/scripts.js"></script>
</body>
</html>
