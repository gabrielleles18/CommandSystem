<?php

/**
 * Classe ProdutosController
 *
 */

namespace Mini\Controller;

use Mini\Model\Produto;

class ProdutosController {
    /**
     * Action: index
     * Este método manipula o que acontece quando acessa http://localhost/produtos/index
     */
    public function index() {
        $Produto = new Produto();

        $produtos = $Produto->getAllProdutos();
        $amount_of_produtos = $Produto->getAmountOfProdutos();
        $categoria = $Produto->getAllCategoria();
        $unidade = $Produto->getAllUnidade();


        // carregar a view produtos. com as views nós podemos mostrar os $produtos e a $amount_of_produtos facilmente
        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    /**
     * ACTION: add
     * Este método manipula o que acontece quando acessamos http://localhost/projeto/produtos/add
     * IMPORTANTE: Isto não é uma página normal, isto é um ACTION. Isto é onde está o form "adicionar um produto" em produtos/index
     * direciona o usuário após o envio do formulário. Esse método manipula todos os dados POST do formulário e, em seguida, redireciona
     * o usuário de volta para produtos/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação POST.
     */
    public function add() {
        if (isset($_POST["submit_add_produto"])) {

            $Produto = new Produto();
            $Produto->add($_POST["nome"], $_POST["preco"], $_POST["tamanho"], $_POST["descricao"],
                $_POST["borda_idborda"], $_POST["unidmed_idunid"], $_POST["categoria_idcat"]);
        }

        // onde ir depois que o produto foi adicionado
        header('location: ' . URL . 'produtos/index');
    }

    /**
     * ACTION: delete
     * Este método lida com o que acontece quando você se move para http://localhost/produtos/delete
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o botãoe "excluir um produto" em produtos/index
     * direciona o usuário após o clique. Este método trata de todos os dados da requisição GET (na URL!) E depois
     * redireciona o usuário de volta para produtos/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação GET.
     * @param int $produto_id Id do produto para excluir
     */
    public function delete($produto_id) {
        if (isset($produto_id)) {
            $Produto = new Produto();
            $Produto->delete($produto_id);
        }

        // onde ir depois que o produto foi excluído
        header('location: ' . URL . 'produtos/index');
    }

    /**
     * ACTION: edit
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/produtos/edit
     * @param int $produto_id Id do produto a editar
     */
    public function edit($produto_id) {
        if (isset($produto_id)) {
            $Produto = new Produto();
            $produto = $Produto->getProduto($produto_id);

            $categoria = $Produto->getAllCategoria();
            $unidade = $Produto->getAllUnidade();

            // Se o produto não foi encontrado, então ele teria retornado falso, e precisamos exibir a página de erro
            if ($produto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // carregar a view produtos. nas views nós podemos mostrar $produto facilmente
                require APP . 'view/_templates/header.php';
                require APP . 'view/produtos/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            header('location: ' . URL . 'produtos/index');
        }
    }

    /**
     * ACTION: update
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/produtos/update
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o form "atualizar um produto" fica produtos/edit
     * direciona o usuário após o envio do formulário. Esse método manipula todos os dados POST do formulário e, em seguida, redireciona
     * o usuário de volta para produtos/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação POST.
     */
    public function update() {
        if (isset($_POST["submit_update_produto"])) {
            $Produto = new Produto();

            $Produto->update($_POST["nome"], $_POST["preco"], $_POST["tamanho"], $_POST["descricao"],
                $_POST["borda_idborda"], $_POST["unidmed_idunid"], $_POST["categoria_idcat"], $_POST['produto_id']);
        }

        // onde ir depois que o produto foi adicionado
        header('location: ' . URL . 'produtos/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentação
     */
    public function ajaxGetStats() {
        $Produto = new Produto();
        $amount_of_produtos = $Produto->getAmountOfProdutos();

        // simplesmente ecoar alguma coisa. Uma API supersimple seria possível fazendo eco ao JSON aqui
        echo $amount_of_produtos;
    }


    public function listar() {
        unset($_COOKIE['dataCard']);
        $Produto = new Produto();

        $categorias = $Produto->getAllCategoria();
        if (!empty($categorias)) {
            foreach ($categorias as $is => $valor) {
                $produtos_by_cat[$valor->nome] = $Produto->getProdutoByCat($valor->idcat);
            }
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/listar.php';
        require APP . 'view/_templates/sidebar.php';

    }

}
