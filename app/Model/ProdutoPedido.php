<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class ProdutoPedido extends Model {

    public function add($produto_idproduto, $pedido_idpedido, $qt_prod) {
        $sql = "INSERT INTO produto_pedido (produto_idproduto, pedido_idpedido, qt_prod ) 
                VALUES (:produto_idproduto, :pedido_idpedido, :qt_prod)";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_idproduto' => $produto_idproduto, ':pedido_idpedido' => $pedido_idpedido, ':qt_prod' => $qt_prod);

        $query->execute($parameters);
    }

    public function updateqt($pedido_idpedido, $produto_idproduto, $qt_prod) {
        $sql = "UPDATE produto_pedido SET qt_prod = :qt_prod 
                WHERE pedido_idpedido = :pedido_idpedido and produto_idproduto = :produto_idproduto";
        $query = $this->db->prepare($sql);
        $parameters = array(':qt_prod' => $qt_prod, ':pedido_idpedido' => $pedido_idpedido, ':produto_idproduto' => $produto_idproduto);

        return $query->execute($parameters);
    }
}
