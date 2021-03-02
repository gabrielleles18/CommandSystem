<?php

namespace Mini\Model;

use Mini\Core\Model;

class  Estatistica extends Model {

    public function getAllPedidosByUser() {
        $sql = "SELECT funcionario.nome, pedido.idpedido, COUNT(*) as total_pedidos 
                    from funcionario 
                    left join pedido on funcionario.idfuncionario = pedido.funcionario_idfuncionario 
                    GROUP BY 1 ORDER BY total_pedidos DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function geQtProduto (){
        $sql = "SELECT produto_pedido.*, produto.nome, sum(produto_pedido.qt_prod)as soma_prod 
                FROM produto_pedido LEFT JOIN produto on produto_pedido.produto_idproduto = produto.idproduto 
                GROUP BY 1 ORDER BY soma_prod DESC  LIMIT 3 ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getTotalProd (){
        $sql = "SELECT produto.nome, sum(produto_pedido.qt_prod)as soma_prod 
                FROM produto_pedido LEFT JOIN produto on produto_pedido.produto_idproduto = produto.idproduto 
                GROUP BY 1 ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getTotalPedido (){
        $sql = "SELECT COUNT(*) as total_pedido FROM pedido";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getValorTotalPedido (){
        $sql = "SELECT sum(pedido.valor) as total FROM pedido ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
}
