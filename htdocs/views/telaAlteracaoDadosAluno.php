<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Alterar Dados</title>
</head>
<?php
    require_once '../models/usuarioModel.php';
    
    session_start();

    if ($_SESSION['esta_logado'] !== true) {
        header('Location: telaLogin.php');
        exit();
    }

    $id_usuario = $_SESSION['id_usuario'];

    $usuarioModel = new usuarioModel();

    $usuario = $usuarioModel->buscarUsuarioPorId($id_usuario);

?>
<body>
    <header>
        <h1>Alterar Dados</h1>
        <?php
            require_once '../public/html/menuAluno.html';
        ?>
    </header>
    <main>
        <form action="../routers/usuarioRouter.php" method="post">
            <label for="nome">Nome</label>
            <br>
            <input type="text" name="nome" id="nome">
            <br>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email" id="email">
            <br>
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $id_usuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvarDados">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>