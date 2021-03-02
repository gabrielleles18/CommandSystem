<?php

/**
 * Class Produtos
 */

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;
use PDO;

class Produto extends Model {
    /**
     * Get all Produtos from database
     */
    public function getAllProdutos() {
        $sql = "SELECT idproduto, nome, preco, tamanho, categoria_idcat, unidmed_idunid  FROM produto";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() é o método PDO que recebe todos os registros retornados, aqui em object-style porque definimos isso em
        // core/controller.php! Se preferir obter um array associativo como resultado, use
        // $query->fetchAll(PDO::FETCH_ASSOC); ou mude as opções em core/controller.php's PDO para
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Adicionar um Produto para o banco
     * @param string $descricao Descrição
     * @param string $unidade Unidade
     */
    public function add($nome, $preco, $tamanho, $descricao, $borda_idborda, $unidmed_idunid, $categoria_idcat, $image) {
        $sql = "INSERT INTO produto (nome, preco, tamanho, descricao, borda_idborda, unidmed_idunid, categoria_idcat, image ) 
                VALUES (:nome, :preco, :tamanho, :descricao, :borda_idborda, :unidmed_idunid, :categoria_idcat, :image )";

        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':preco' => $preco, ':tamanho' => $tamanho, ':descricao' => $descricao,
            ':borda_idborda' => $borda_idborda, ':unidmed_idunid' => $unidmed_idunid, ':categoria_idcat' => $categoria_idcat,
            ':image' => $image);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        return $query->execute($parameters);
    }

    /**
     * Excluir um Produto do banco de dados
     * Por favor note: este é apenas um exemplo! Em uma aplicação real, você não deixaria simplesmente ninguém excluir
     * add/update/delete equipe!
     * @param int $produto_id Id do Produto
     */
    public function delete($produto_id) {
        $sql = "DELETE FROM produto WHERE idproduto = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Receber um Produto do banco
     * @param integer $produto_id
     */
    public function getProduto($produto_id) {
        $sql = "SELECT idproduto, nome, preco, tamanho, descricao, borda_idborda, unidmed_idunid, categoria_idcat, image  FROM produto WHERE idproduto = :produto_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Atualizar um Produto no banco
     * @param string $descricao Descrição
     * @param string $unidade Unidade
     * @param int $produto_id Id
     */
    public function update($nome, $preco, $tamanho, $descricao, $borda_idborda, $unidmed_idunid, $categoria_idcat, $produto_id) {
        $sql = "UPDATE produto SET nome = :nome, preco = :preco,  tamanho = :tamanho, descricao = :descricao, borda_idborda = :borda_idborda,
                    unidmed_idunid  = :unidmed_idunid, categoria_idcat = :categoria_idcat  WHERE idproduto = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':preco' => $preco, ':tamanho' => $tamanho, ':descricao' => $descricao,
            ':borda_idborda' => $borda_idborda, ':unidmed_idunid' => $unidmed_idunid, ':categoria_idcat' => $categoria_idcat,
            ':produto_id' => $produto_id);

//         echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
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
