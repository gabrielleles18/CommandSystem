<?php


namespace Mini\Model;

use Mini\Core\Model;

class Pedido extends Model {

    public function add($data_pedido, $observacoes, $valor, $status, $mesa_idmesa, $funcionario_idfuncionario) {
        $sql = "INSERT INTO pedido (data_pedido, observacoes, valor, status, mesa_idmesa, funcionario_idfuncionario ) 
                VALUES (:data_pedido, :observacoes, :valor, :status, :mesa_idmesa, :funcionario_idfuncionario)";
        $query = $this->db->prepare($sql);
        $lastId = $this->db->lastInsertId();
        $parameters = array(':data_pedido' => $data_pedido, ':observacoes' => $observacoes, ':valor' => $valor,
            ':status' => $status, ':mesa_idmesa' => $mesa_idmesa, ':funcionario_idfuncionario' => $funcionario_idfuncionario);

        $query->execute($parameters);
        return $lastId;
    }

    public function getPedido($idpedido) {
        $sql = "SELECT * FROM pedido WHERE idpedido = :idpedido LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idpedido' => $idpedido);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }
}
