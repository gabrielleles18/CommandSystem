<?php

/**
 * Class Funcionarios
 */

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class Funcionario extends Model {
    /**
     * Get all funcionarios from database
     */
    public function getAllFuncionarios() {
        $sql = "SELECT 
            f.idfuncionario , 
            f.nome, 
            f.cpf, 
            f.telefone, 
            f.data_nasc, 
            f.status,
            funcao.nome as funcao
        FROM 
            funcionario f
        inner join
            funcao on f.funcao_idfuncao = funcao.idfuncao";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() é o método PDO que recebe todos os registros retornados, aqui em object-style porque definimos isso em
        // core/controller.php! Se preferir obter um array associativo como resultado, use
        // $query->fetchAll(PDO::FETCH_ASSOC); ou mude as opções em core/controller.php's PDO para
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Adicionar um funcionario para o banco
     * @param string $nome Nome
     * @param string $email E-mail
     * @param string $data_nasc Nascimento
     * @param string $cpf CPF
     */
    public function add($nome, $cpf, $telefone, $data_nasc, $usuario, $senha, $funcao_idfuncao, $status) {
        $sql = "INSERT INTO funcionario (nome, cpf, telefone, data_nasc, usuario, senha, funcao_idfuncao, status ) 
                VALUES (:nome, :cpf, :telefone, :data_nasc, :usuario, :senha, :funcao_idfuncao, :status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':cpf' => $cpf, ':telefone' => $telefone, ':data_nasc' => $data_nasc,
            ':usuario' => $usuario, ':senha' => $senha, ':funcao_idfuncao' => $funcao_idfuncao, ':status' => $status);

        // útil para debugar: você pode ver o SQL atrás da construção usando:
//         echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Excluir um funcionario do banco de dados
     * Por favor note: este é apenas um exemplo! Em uma aplicação real, você não deixaria simplesmente ninguém excluir
     * add/update/delete equipe!
     * @param int $funcionario_id Id do funcionario
     */
    public function delete($funcionario_id) {
        $sql = "DELETE FROM funcionario WHERE idfuncionario = :funcionario_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcionario_id' => $funcionario_id);

        // útil para debugar: você pode ver o SQL atrás da construção usando:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Receber um funcionario do banco
     * @param integer $funcionario_id
     */
    public function getFuncionario($funcionario_id) {
        $sql = "SELECT idfuncionario, nome, cpf, telefone, data_nasc, usuario, senha, funcao_idfuncao, status FROM funcionario WHERE idfuncionario = :funcionario_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcionario_id' => $funcionario_id);

        // útil para debugar: você pode ver o SQL atrás da construção usando:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() é o método do PDO que recebe exatamente um registro
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Atualizar um funcionario no banco
     * @param string $nome Nome
     * @param string $email E-mail
     * @param string $data_nasc Nascimento
     * @param string $cpf CPF
     * @param int $funcionario_id Id
     */
    public function update($nome, $cpf, $telefone, $data_nasc, $usuario, $senha, $funcao_idfuncao, $status, $funcionario_id) {
        $sql = "UPDATE funcionario SET nome = :nome, cpf = :cpf, telefone = :telefone, data_nasc = :data_nasc,
                usuario = :usuario, senha = :senha, funcao_idfuncao = :funcao_idfuncao, status =:status WHERE idfuncionario = :funcionario_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':cpf' => $cpf, ':telefone' => $telefone, ':data_nasc' => $data_nasc,
            ':usuario' => $usuario, ':senha' => $senha, ':funcao_idfuncao' => $funcao_idfuncao, ':status' => $status, ':funcionario_id' => $funcionario_id);

        // útil para debugar: você pode ver o SQL atrás da construção usando:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Obtenha "estatísticas" simples. Esta é apenas uma demonstração simples para mostrar
     * como usar mais de um modelo em um controlador
     * (veja application/controller/funcionarios.php para detalhes)
     */
    public function getAmountOfFuncionarios() {
        $sql = "SELECT COUNT(idfuncionario) AS amount_of_funcionarios FROM funcionario";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() é o método do PDO que recebe exatamente um registro
        return $query->fetch()->amount_of_funcionarios;
    }
}
