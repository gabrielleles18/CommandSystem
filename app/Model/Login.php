<?php


namespace Mini\Model;

use Mini\Core\Model;
use PDO;

class Login extends Model {

    public function verify($usuario, $senha) {
        $sql = "SELECT * FROM funcionario WHERE usuario = :usuario AND senha = :senha LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':usuario' => $usuario, 'senha' => $senha);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }
}
