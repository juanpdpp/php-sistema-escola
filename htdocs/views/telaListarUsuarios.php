<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $usuarioModel = new usuarioModel();

    $usuarios = $usuarioModel->buscarUsuarios();
?>
<body>
    <header>
        <h1>Listar Usuarios</h1>
        <?php require_once '../public/html/menuAdmin.html' ?>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario) :?>
                    <tr>
                        <td><?= $usuario->nome; ?></td>
                        <td>
                            <a href="telaEditarUsuario.php?id_usuario=<?= $usuario->id_usuario; ?>">Editar</a>
                            <br>
                            <a href="telaListarNotas.php?id_usuario=<?= $usuario->id_usuario; ?>">Notas</a>
                            <form action="../routers/usuarioRouter.php" method="post">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario->id_usuario; ?>">
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