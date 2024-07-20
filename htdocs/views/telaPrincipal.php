<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Principal</title>
</head>
<body>
<?php
    session_start();

    if ($_SESSION['esta_logado'] !== true ) {
        header('Location: telaLogin.php');
        exit();
    }

?>
<body>
    <header>
        <h1>Principal</h1>
        <?php
            if ($_SESSION['id_tipo_usuario'] == 1) {
                require_once '../public/html/menuAdmin.html';
            }
            else {
                require_once '../public/html/menuAluno.html';
            }
        ?>
        
    </header>
</body>
</html>