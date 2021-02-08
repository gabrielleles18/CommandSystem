<?php

use Mini\Controller\index;

$breadcrumb = Index::gerateBreadcrumb([
    [
        'url' => URL,
        'text' => 'Home'
    ],
    [
        'url' => '#',
        'text' => 'Página não encontrada'
    ]
]);
?>
<?= $breadcrumb ?>
<div class="container">
    <p>Página não encontrada.</p>
</div>
</div>
