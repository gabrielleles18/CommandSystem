<?php


namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;
use PDO;

class Pedido extends Model {

    public function add($data_pedido, $observacoes, $valor, $status_id, $mesa_idmesa, $funcionario_idfuncionario) {
        $sql = "INSERT INTO pedido (data_pedido, observacoes, valor, status_id, mesa_idmesa, funcionario_idfuncionario ) 
                VALUES (:data_pedido, :observacoes, :valor, :status_id, :mesa_idmesa, :funcionario_idfuncionario)";
        $query = $this->db->prepare($sql);

        $parameters = array(':data_pedido' => $data_pedido, ':observacoes' => $observacoes, ':valor' => $valor,
            ':status_id' => $status_id, ':mesa_idmesa' => $mesa_idmesa, ':funcionario_idfuncionario' => $funcionario_idfuncionario);
//         echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function lastID() {
        $sql = "select max(idpedido) as idpedido from pedido";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getPedido($idpedido) {
        $sql = "SELECT * FROM pedido WHERE idpedido = :idpedido LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idpedido' => $idpedido);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function getAllPedidos() {
        $sql = "SELECT * FROM pedido order by pedido.idpedido DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getItensPedido($idpedido) {
        $sql = "SELECT pedido.idpedido, produto.*, produto_pedido.qt_prod FROM pedido
                INNER JOIN produto_pedido ON produto_pedido.pedido_idpedido = pedido.idpedido
                INNER JOIN produto ON produto_pedido.produto_idproduto = produto.idproduto 
            WHERE
                pedido.idpedido = :idpedido";

        $query = $this->db->prepare($sql);
        $parameters = array(':idpedido' => $idpedido);
        $query->execute($parameters);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus($idpedido, $status_id) {
        $sql = "UPDATE pedido SET status_id = :status_id  WHERE idpedido = :idpedido";
        $query = $this->db->prepare($sql);
        $parameters = array(':status_id' => $status_id, ':idpedido' => $idpedido);

//         echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);

        header('location: ' . URL . 'pedido/?id=' . $idpedido);

    }

    public function getStatus($status_id) {
        $sql = "select * from status where id = :status_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':status_id' => $status_id);

        $query->execute($parameters);

        return $query->fetch();
    }
}


