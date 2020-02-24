<div class="sidebar">
    <div class="logo">Logo</div>
    <ul>
        <li><i class="icon-home"></i><a href="<?php echo URL; ?>">Home</a></li>
        <li><i class="icon-mesa"></i><a href="<?php echo URL; ?>clientes">Clientes</a></li>
        <li><i class="icon-history"></i><a href="<?php echo URL; ?>produtos">Produtos</a></li>
        <li><i class="icon-history"></i><a href="<?php echo URL; ?>funcao">Função</a></li>
    </ul>
</div>
</main>

<!-- jQuery, loaded in the recommended protocol-less way -->
<!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
<script>
    var url = "<?php echo URL; ?>";
</script>

<!-- our JavaScript -->
<script src="<?php echo URL; ?>js/application.js"></script>
</body>
</html>
