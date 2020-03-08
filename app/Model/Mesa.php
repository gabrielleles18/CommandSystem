<?php


namespace Mini\Model;

use Mini\Core\Model;

class Mesa extends Model{
    public function getAllMessa() {
        $sql = "SELECT idmesa, numero, descricao, status  FROM mesa";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($numero, $descricao, $status) {
        $sql = "INSERT INTO mesa (numero, descricao, status) VALUES (:numero, :descricao, :status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':numero' => $numero, ':descricao' => $descricao, ':status' => $status);

        $query->execute($parameters);
    }

    public function delete($mesa_id) {
        $sql = "DELETE FROM mesa WHERE idmesa = :mesa_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':mesa_id' => $mesa_id);

        $query->execute($parameters);
    }

    public function getMesa($mesa_id) {
        $sql = "SELECT idmesa, numero, descricao, status FROM mesa WHERE idmesa = :mesa_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':mesa_id' => $mesa_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($numero, $descricao, $status, $mesa_id) {
        $sql = "UPDATE mesa SET numero = :numero, descricao = :descricao, status = :status WHERE idmesa = :mesa_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':numero' => $numero, ':descricao' => $descricao, ':status' => $status,':mesa_id' => $mesa_id);

        $query->execute($parameters);
    }

    public function getAmountOfMesa() {
        $sql = "SELECT COUNT(idmesa) AS amount_of_mesa FROM mesa";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_mesa;
    }

    public function getMessa($status){
        $sql = "SELECT idmesa, numero, descricao, status  FROM mesa where status = {$status}";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}