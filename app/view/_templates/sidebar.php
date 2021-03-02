<div class="sidebar">
    <div class="logo">Logo</div>
    <ul>
        <li><a href="<?= URL; ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="<?= URL; ?>funcionarios"><i class="fas fa-user-friends"></i></i> Funcionarios</a></li>
        <li><a href="<?= URL; ?>funcao"><i class="fas fa-people-carry"></i> Função</a></li>
        <li><a href="<?= URL; ?>produtos"><i class="fas fa-pizza-slice"></i> Produtos</a></li>
        <li><a href="<?= URL; ?>mesa"><i class="fas fa-square-full"></i> Mesa</a></li>
        <li><a href="<?= URL; ?>pedido/listar"><i class="fas fa-history"></i> Pedidos</a></li>
        <li><a href="<?= URL ?>estatistica"><i class="far fa-chart-bar"></i> Estatísticas</a></li>
    </ul>
</div>
</main>
<script src="https://kit.fontawesome.com/2909cd6cac.js" crossorigin="anonymous"></script>
<script>
    let URL_BASE = "<?= URL; ?>";
    let GET = "<?= $_GET['id'] ?? '' ?>"
</script>
<script src="<?= URL ?>public/dist/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
