<?php


namespace Mini\Model;


use Mini\Core\Model;

class Funcao extends Model {

    public function getAllFuncao() {
        $sql = "SELECT idfuncao, nome, status  FROM funcao";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($nome, $status) {
        $sql = "INSERT INTO funcao (nome, status) VALUES (:nome, :status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':status' => $status);

        $query->execute($parameters);
    }

    public function delete($funcao_id) {
        $sql = "DELETE FROM funcao WHERE idfuncao = :funcao_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcao_id' => $funcao_id);

        $query->execute($parameters);
    }

    public function getFuncao($funcao_id) {
        $sql = "SELECT idfuncao, nome, status FROM funcao WHERE idfuncao = :funcao_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcao_id' => $funcao_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($nome, $status, $funcao_id) {
        $sql = "UPDATE funcao SET nome = :nome, status = :status WHERE idfuncao = :funcao_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':status' => $status, ':funcao_id' => $funcao_id);

        $query->execute($parameters);
    }
}
