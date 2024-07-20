<?php
    require_once '../controllers/tipoUsuarioController.php';

    $tipoUsuarioController = new tipoUsuarioController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $descricao = $_POST['descricao'];

            $tipoUsuarioController->cadastrarTipoUsuario($descricao);

            break;
        case "excluir":
            $id_tipo_usuario = intval($_POST['id_tipo_usuario']);

            $tipoUsuarioController->excluirTipoUsuario($id_tipo_usuario);

            break;
        case "salvar":
            $id_tipo_usuario = $_POST['id_tipo_usuario'];
            $descricao = $_POST['descricao'];

            $tipoUsuarioController->atualizarTipoUsuario($id_tipo_usuario, $descricao);

            break;
    }
?>