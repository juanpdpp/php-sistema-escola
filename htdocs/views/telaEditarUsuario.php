<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo Usuario</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $id_usuario = $_GET['id_usuario'];

    $usuarioModel = new usuarioModel();

    $usuario = $usuarioModel->buscarUsuarioPorId($id_usuario);
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Usuario</h1>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post">
            <label for="id_tipo_usurio">Tipo Usuario</label>
            <br>
            <input type="text" name="id_tipo_usuario" id="id_tipo_usuario" value="<?= $usuario->id_tipo_usuario?>">
            <br>
            <label for="nome">Nome do Usuario</label>
            <br>
            <input type="text" name="nome" id="nome" value="<?= $usuario->nome; ?>">
            <br>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email" id="email" value="<?= $usuario->email?>">
            <br>
            <label for="senha">Senha</label>
            <br>
            <input type="text" name="senha" id="senha">
            <br>
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario->id_usuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>