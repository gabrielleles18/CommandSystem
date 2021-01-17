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
    <p>Página não encontrada. Será mostrada quando uma página (= controller / method) não existir.</p>
</div>
</div>
