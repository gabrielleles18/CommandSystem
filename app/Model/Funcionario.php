<?php

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class Funcionario extends Model {

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

        return $query->fetchAll();
    }

    public function add($nome, $cpf, $telefone, $data_nasc, $usuario, $senha, $funcao_idfuncao, $status) {
        $sql = "INSERT INTO funcionario (nome, cpf, telefone, data_nasc, usuario, senha, funcao_idfuncao, status ) 
                VALUES (:nome, :cpf, :telefone, :data_nasc, :usuario, :senha, :funcao_idfuncao, :status)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':cpf' => $cpf, ':telefone' => $telefone, ':data_nasc' => $data_nasc, ':usuario' => $usuario, ':senha' => $senha, ':funcao_idfuncao' => $funcao_idfuncao, ':status' => $status);

        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function delete($funcionario_id) {
        $sql = "DELETE FROM funcionario WHERE idfuncionario = :funcionario_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcionario_id' => $funcionario_id);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
    }

    public function getFuncionario($funcionario_id) {
        $sql = "SELECT idfuncionario, nome, cpf, telefone, data_nasc, usuario, senha, funcao_idfuncao, status FROM funcionario WHERE idfuncionario = :funcionario_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcionario_id' => $funcionario_id);

        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($nome, $cpf, $telefone, $data_nasc, $usuario, $senha, $funcao_idfuncao, $status, $funcionario_id) {
        $sql = "UPDATE funcionario SET nome = :nome, cpf = :cpf, telefone = :telefone, data_nasc = :data_nasc,
                usuario = :usuario, senha = :senha, funcao_idfuncao = :funcao_idfuncao, status =:status WHERE idfuncionario = :funcionario_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':cpf' => $cpf, ':telefone' => $telefone, ':data_nasc' => $data_nasc, ':usuario' => $usuario, ':senha' => $senha, ':funcao_idfuncao' => $funcao_idfuncao, ':status' => $status, ':funcionario_id' => $funcionario_id);

        return $query->execute($parameters);
    }

    public function getAllFuncao() {
        $sql = "SELECT idfuncao, nome FROM funcao";
        $query = $this->db->prepare($sql);

        $query->execute();
        return $query->fetchAll();
    }
}
