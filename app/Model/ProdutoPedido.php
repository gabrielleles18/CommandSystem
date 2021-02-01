<?php


namespace Mini\Model;


use Mini\Core\Model;
use Mini\Libs\Helper;

class ProdutoPedido extends Model {

    public function add($produto_idproduto, $pedido_idpedido, $qt_prod) {
        $sql = "INSERT INTO produto_pedido (produto_idproduto, pedido_idpedido, qt_prod ) 
                VALUES (:produto_idproduto, :pedido_idpedido, :qt_prod)";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_idproduto' => $produto_idproduto,
            ':pedido_idpedido' => $pedido_idpedido, ':qt_prod' => $qt_prod);
//         echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }
}
