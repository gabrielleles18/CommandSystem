<?php


namespace Mini\Controller;


use Mini\Model\Funcao;

class FuncaoController {

    public function index() {
        $funcao = new Funcao();
        $funcoes = $funcao->getAllFuncao();

        require APP . 'view/_templates/head.php';
        require APP . 'view/_templates/header.php';
        require APP . 'view/funcao/index.php';
        require APP . 'view/_templates/sidebar.php';
    }

    /**
     * ACTION: add
     * Este método manipula o que acontece quando acessamos http://localhost/projeto/funcao/add
     * IMPORTANTE: Isto não é uma página normal, isto é um ACTION. Isto é onde está o form "adicionar um funcao" em funcao/index
     * direciona o usuário após o envio do formulário. Esse método manipula todos os dados POST do formulário e, em seguida, redireciona
     * o usuário de volta para funcao/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação POST.
     */
    public function add() {
        if (isset($_POST["submit_add_funcao"])) {
            $funcao = new Funcao();
            $funcao->add($_POST["nome"], $_POST["status"]);
        }

        header('location: ' . URL . 'funcao/index');
    }

    /**
     * ACTION: delete
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/delete
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o botãoe "excluir um funcao" em funcao/index
     * direciona o usuário após o clique. Este método trata de todos os dados da requisição GET (na URL!) E depois
     * redireciona o usuário de volta para funcao/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação GET.
     * @param int $funcao_id Id do funcao para excluir
     */
    public function delete($funcao_id) {
        if (isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao->delete($funcao_id);
        }

        header('location: ' . URL . 'funcao/index');
    }

    /**
     * ACTION: edit
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/edit
     * @param int $funcao_id Id do funcao a editar
     */
    public function edit($funcao_id) {
        if (isset($funcao_id)) {
            $funcao = new Funcao();
            $funcao = $funcao->getFuncao($funcao_id);

            if ($funcao === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/head.php';
                require APP . 'view/_templates/header.php';
                require APP . 'view/funcao/edit.php';
                require APP . 'view/_templates/sidebar.php';
            }
        } else {
            // redirecionar o usuário para a página de índice do funcao (pois não temos um funcao_id)
            header('location: ' . URL . 'funcao/index');
        }
    }

    /**
     * ACTION: update
     * Este método lida com o que acontece quando você se move para http://localhost/projeto/funcao/update
     * IMPORTANTE: Esta não é uma página normal, é uma ACTION. Isto é onde o form "atualizar um funcao" fica funcao/edit
     * direciona o usuário após o envio do formulário. Esse método manipula todos os dados POST do formulário e, em seguida, redireciona
     * o usuário de volta para funcao/index através da última linha: header(...)
     * Este é um exemplo de como lidar com uma solicitação POST.
     */
    public function update() {
        if (isset($_POST["submit_update_funcao"])) {
            $funcao = new Funcao();
            $funcao->update($_POST["nome"], $_POST["status"], $_POST['funcao_id']);
        }

        header('location: ' . URL . 'funcao/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentação
     */
    public function F() {
        $funcao = new Funcao();
        $amount_of_funcao = $funcao->getAmountOfFuncao();

        echo $amount_of_funcao;
    }
}
