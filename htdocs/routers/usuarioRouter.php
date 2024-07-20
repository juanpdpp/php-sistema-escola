<?php
    require_once '../controllers/usuarioController.php';

    $usuarioController = new usuarioController();

    $rota = $_POST['rota'];

    switch ($rota) {
        case "entrar":
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->validarUsuario($email, $senha);
            
            break;
            
        case "cadastrar":
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->cadastrarUsuario($nome, $email, $senha);

            break;

        case "excluir":
            $id_usuario = intval($_POST['id_usuario']);

            $usuarioController->excluirUsuario($id_usuario);

            break;

        case "salvar":
            $id_usuario = $_POST['id_usuario'];
            $id_tipo_usuario = $_POST['id_tipo_usuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuarioController->atualizarUsuario($id_usuario, $id_tipo_usuario, $nome, $email, $senha);

            break;

        case "salvarDados":
            $id_usuario = intval($_POST['id_usuario']);

            $nome = $_POST['nome'];
            $email = $_POST['email'];

            $usuarioController->atualizarDados($id_usuario, $nome, $email);

            break;

        case "salvarSenha":
            $id_usuario = intval($_POST['id_usuario']);

            $senha = $_POST['senha'];

            $usuarioController->atualizarSenha($id_usuario, $senha);
            
            break;
        
    }
?>