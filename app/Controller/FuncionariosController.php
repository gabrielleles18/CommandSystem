<?php

namespace Mini\Controller;

use Mini\Model\Funcionario;

class FuncionariosController {

    public function index() {
        $user = json_decode($_COOKIE['login']);
        if($user->funcao_idfuncao != 1) header('location: ' . URL);

        $funcionario = new Funcionario();

        $funcionarios = $funcionario->getAllFuncionarios();
        $funcao = $funcionario->getAllFuncao();


        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/funcionarios/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    public function add() {
        if($_POST["senha"] == $_POST['senha_comfirm']) {
            if(isset($_POST["submit_add_funcionario"])) {
                $funcionario = new Funcionario();
                $funcionario->add($_POST["nome"], $_POST["cpf"], $_POST["telefone"], $_POST["data_nasc"], $_POST["usuario"], $_POST["senha"], $_POST["funcao_idfuncao"], $_POST["status"]);
            }
        } else {
            echo "<pre>";
            print_r('As senhas não se correspondem!');
            exit();
        }
        header('location: ' . URL . 'funcionarios/index');
    }

    public function delete($funcionario_id) {
        if(isset($funcionario_id)) {
            $funcionario = new Funcionario();
            $funcionario->delete($funcionario_id);
        }

        header('location: ' . URL . 'funcionarios/index');
    }

    public function edit($funcionario_id) {
        if(isset($funcionario_id)) {
            $funcionario = new Funcionario();
            $funcao = $funcionario->getAllFuncao();
            $funcionario = $funcionario->getFuncionario($funcionario_id);

            if($funcionario === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/funcionarios/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            header('location: ' . URL . 'funcionarios/index');
        }
    }

    public function update() {
        if(isset($_POST["submit_update_funcionario"])) {
            $funcionario = new Funcionario();
            $return = $funcionario->update($_POST["nome"], $_POST["cpf"], $_POST["telefone"], $_POST["data_nasc"], $_POST["usuario"], $_POST["senha"], $_POST["funcao_idfuncao"], $_POST["status"], $_POST['funcionario_id']);
        }

        if($return) {
            $data = [
                'tipo' => 1,
                'mensagem' => 'Informações do funcionario: ' . $_POST["nome"] . ', foram alteradas com sucesso!'];
            setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
        }else{
            $data = [
                'tipo' => 0,
                'mensagem' => 'Erro inesperado!'];
            setcookie('alert', json_encode($data), time() + 3600 * 24 * 5, '/');
        }

        header('location: ' . URL . 'funcionarios/index');
    }

    public function getFuncionario($funcionario_id) {
        $sql = "SELECT * FROM funcionario WHERE funcionario_id = :funcionario_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':funcionario_id' => $funcionario_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }
}
