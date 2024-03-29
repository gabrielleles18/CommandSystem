<?php


namespace Mini\Model;

use Mini\Core\Model;

class Status extends Model {
    public function getAllStatus() {
        $sql = "SELECT id, numero, slug FROM status";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getStatusAberto($id) {
        $sql = "SELECT id  FROM status WHERE numero = :id";
        $query = $this->db->prepare($sql);

        $parameters = array(':id' => $id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getStatus($id) {
        $sql = "SELECT *  FROM status WHERE id = :id";
        $query = $this->db->prepare($sql);

        $parameters = array(':id' => $id);
        $query->execute($parameters);

        return $query->fetch();
    }
}
