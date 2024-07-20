<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Tipo Usuario</title>
</head>
<?php
    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1) {
        header('Location: telaLogin.php');
        exit();
    }

    require_once '../public/html/menuAdmin.html';
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Cadastrar Tipo Usuario</h1>
    </header>
    <main>
        <form action="../routers/tipoUsuarioRouter.php" method="post" onsubmit="return validarCamposCadastro(event);">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name="descricao" id="descricao" required>
            <br>
            <input type="hidden" name="rota" id="rota" value="cadastrar">
            <input type="submit" value="Cadastrar">
        </form>
    </main>
</body>
</html>