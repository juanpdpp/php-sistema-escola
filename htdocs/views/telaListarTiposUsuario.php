<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Tipos Usuario</title>
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $tipoUsuarioModel = new tipoUsuarioModel();

    $tiposUsuario = $tipoUsuarioModel->buscarTiposUsuario();
?>
<body>
    <header>
        <h1>Listar Tipos Usuario</h1>
        <?php require_once '../public/html/menuAdmin.html' ?>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Descricao</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tiposUsuario as $tipoUsuario) :?>
                    <tr>
                        <td><?= $tipoUsuario->descricao; ?></td>
                        <td>
                            <a href="telaEditarTipoUsuario.php?id_tipo_usuario=<?= $tipoUsuario->id_tipo_usuario; ?>">Editar</a>
                            <form action="../routers/tipoUsuarioRouter.php" method="post">
                                <input type="hidden" name="id_tipo_usuario" id="id_tipo_usuario" value="<?= $tipoUsuario->id_tipo_usuario; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="Excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>