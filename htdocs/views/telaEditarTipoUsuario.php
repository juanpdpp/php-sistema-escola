<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo Usuario</title>
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $id_tipo_usuario = $_GET['id_tipo_usuario'];

    $tipoUsuarioModel = new tipoUsuarioModel();

    $tipoUsuario = $tipoUsuarioModel->buscarTipoUsuarioPorId($id_tipo_usuario);
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Tipo Usuario</h1>
    </header>
    <main>
        <form action="../routers/tipoUsuarioRouter.php" method="post">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao" id="descricao" value="<?= $tipoUsuario->descricao; ?>">
            <br>
            <input type="hidden" name="id_tipo_usuario" id="id_tipo_usuario" value="<?= $tipoUsuario->id_tipo_usuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>