<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;
use PDO;

class Produto extends Model {

    public function getAllProdutos() {
        $sql = "SELECT idproduto, nome, preco, tamanho, categoria_idcat, unidmed_idunid  FROM produto";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($nome, $preco, $tamanho, $descricao, $borda_idborda, $unidmed_idunid, $categoria_idcat, $image) {
        $sql = "INSERT INTO produto (nome, preco, tamanho, descricao, borda_idborda, unidmed_idunid, categoria_idcat, image ) 
                VALUES (:nome, :preco, :tamanho, :descricao, :borda_idborda, :unidmed_idunid, :categoria_idcat, :image )";

        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':preco' => $preco, ':tamanho' => $tamanho, ':descricao' => $descricao, ':borda_idborda' => $borda_idborda, ':unidmed_idunid' => $unidmed_idunid, ':categoria_idcat' => $categoria_idcat, ':image' => $image);

        return $query->execute($parameters);
    }

    public function delete($produto_id) {
        $sql = "DELETE FROM produto WHERE idproduto = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    public function getProduto($produto_id) {
        $sql = "SELECT idproduto, nome, preco, tamanho, descricao, borda_idborda, unidmed_idunid, categoria_idcat, image  FROM produto WHERE idproduto = :produto_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($nome, $preco, $tamanho, $descricao, $borda_idborda, $unidmed_idunid, $categoria_idcat, $produto_id) {
        $sql = "UPDATE produto SET nome = :nome, preco = :preco,  tamanho = :tamanho, descricao = :descricao, borda_idborda = :borda_idborda,
                    unidmed_idunid  = :unidmed_idunid, categoria_idcat = :categoria_idcat  WHERE idproduto = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':preco' => $preco, ':tamanho' => $tamanho, ':descricao' => $descricao, ':borda_idborda' => $borda_idborda, ':unidmed_idunid' => $unidmed_idunid, ':categoria_idcat' => $categoria_idcat, ':produto_id' => $produto_id);

        return $query->execute($parameters);
    }

    public function updateImage($image, $produto_id) {
        $sql = "UPDATE produto SET image = :image WHERE idproduto = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':image' => $image, ':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    public function getAllCategoria() {
        $sql = "SELECT idcat, nome FROM categoria";
        $query = $this->db->prepare($sql);

        $query->execute();
        return $query->fetchAll();
    }

    public function getAllUnidade() {
        $sql = "SELECT idunid, nome FROM unidmed";
        $query = $this->db->prepare($sql);

        $query->execute();
        return $query->fetchAll();
    }

    public function getForenkey($tabela, $id, $value) {
        $sql = "SELECT t.nome FROM {$tabela} t WHERE t.{$id} = {$value}";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchColumn();
    }

    public function getProdutoByCat($id_cat) {
        $sql = "SELECT * FROM produto WHERE categoria_idcat = {$id_cat}";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
