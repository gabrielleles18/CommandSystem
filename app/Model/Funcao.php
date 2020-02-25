<?php


namespace Mini\Model;


use Mini\Core\Model;

class Funcao extends Model {
    /**
     * Get all funcao from database
     */
    public function getAllFuncao() {
        $sql = "SELECT idfuncao, nome, status  FROM funcao";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Adicionar um funcao para o banco
     * @param string $nome Nome
     * @param string $email E-mail
     * @param string $data_nasc Nascimento
     * @param string $cpf CPF
     */
    public function add($nome, $status) {
        $sql = "INSERT INTO funcao (nome, status) VALUES (:nome, :status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':status' => $status);

        $query->execute($parameters);
    }

    /**
     * Excluir um funcao do banco de dados
     * Por favor note: este é apenas um exemplo! Em uma aplicação real, você não deixaria simplesmente ninguém excluir
     * add/update/delete equipe!
     * @param int $funcao_id Id do funcao
     */
    public function delete($funcao_id) {
        $sql = "DELETE FROM funcao WHERE idfuncao = :funcao_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcao_id' => $funcao_id);

        $query->execute($parameters);
    }

    /**
     * Receber um funcao do banco
     * @param integer $funcao_id
     */
    public function getFuncao($funcao_id) {
        $sql = "SELECT idfuncao, nome, status FROM funcao WHERE idfuncao = :funcao_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcao_id' => $funcao_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Atualizar um funcao no banco
     * @param string $nome Nome
     * @param string $email E-mail
     * @param string $data_nasc Nascimento
     * @param string $cpf CPF
     * @param int $funcao_id Id
     */
    public function update($nome, $status, $funcao_id) {
        $sql = "UPDATE funcao SET nome = :nome, status = :status WHERE idfuncao = :funcao_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':status' => $status,':funcao_id' => $funcao_id);

        $query->execute($parameters);
    }

    /**
     * Obtenha "estatísticas" simples. Esta é apenas uma demonstração simples para mostrar
     * como usar mais de um modelo em um controlador
     * (veja application/controller/funcao.php para detalhes)
     */
    public function getAmountOfFuncao() {
        $sql = "SELECT COUNT(idfuncao) AS amount_of_funcao FROM funcao";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_funcao;
    }

}