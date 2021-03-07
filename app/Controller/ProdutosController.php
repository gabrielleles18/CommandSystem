<?php

namespace Mini\Controller;

use Mini\Model\Produto;

class ProdutosController {

    public function index() {
        $Produto = new Produto();

        $produtos = $Produto->getAllProdutos();
        $categoria = $Produto->getAllCategoria();
        $unidade = $Produto->getAllUnidade();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if(isset($_POST["submit_add_produto"])) {

            $Produto = new Produto();
            $nome = $this->trataImage('arquivo');
            if(empty($nome)) $nome = '';

            $Produto->add($_POST["nome"], $_POST["preco"], $_POST["tamanho"], $_POST["descricao"], $_POST["borda_idborda"], $_POST["unidmed_idunid"], $_POST["categoria_idcat"], $nome);
        }
        header('location: ' . URL . 'produtos/index');
    }

    public function delete($produto_id) {
        if(isset($produto_id)) {
            $Produto = new Produto();
            $Produto->delete($produto_id);
        }
        header('location: ' . URL . 'produtos/index');
    }

    public function edit($produto_id) {
        if(isset($produto_id)) {
            $Produto = new Produto();
            $produto = $Produto->getProduto($produto_id);

            $categoria = $Produto->getAllCategoria();
            $unidade = $Produto->getAllUnidade();

            if($produto === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/produtos/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            header('location: ' . URL . 'produtos/index');
        }
    }

    public function update() {
        if(isset($_POST["submit_update_produto"])) {
            $Produto = new Produto();

            if(!empty($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
                $nome = $this->trataImage('arquivo');

                $Produto->updateImage($nome, $_POST['produto_id']);
            }
            $return = $Produto->update($_POST["nome"], $_POST["preco"], $_POST["tamanho"], $_POST["descricao"], $_POST["borda_idborda"], $_POST["unidmed_idunid"], $_POST["categoria_idcat"], $_POST['produto_id']);
        }

        $data = [
            'tipo' => 1,
            'mensagem' => 'Informações do produto: ' . $_POST["nome"] .', foi alterado com sucesso!'];
        setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');

        header('location: ' . URL . 'produtos/index');
    }

    public function listar() {
        $Produto = new Produto();

        $categorias = $Produto->getAllCategoria();
        if(!empty($categorias)) {
            foreach($categorias as $is => $valor) {
                $produtos_by_cat[$valor->nome] = $Produto->getProdutoByCat($valor->idcat);
            }
        }

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/produtos/listar.php';
        require APP . 'view/_templates/sidebar.php';

    }

    public function trataImage($name) {
        if(!empty($_FILES[$name]) && $_FILES[$name]['error'] == 0) {

            $hash = md5(uniqid(rand(), true));
            $explode = explode('.', $_FILES[$name]['name']);
            $ext = array_pop($explode);

            $nome = $hash . '.' . $ext;

            $uploaddir = 'C:\xampp\htdocs\SIGEP\public\midias\\' . $nome;
            move_uploaded_file($_FILES[$name]['tmp_name'], $uploaddir);

            return $nome;
        }
    }
}
