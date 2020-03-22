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

<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?= URL; ?>";
</script>

<!-- our JavaScript -->
<script src="<?= URL; ?>js/application.js"></script>
<script src="<?= URL; ?>js/index.js"></script>
</body>
</html>
