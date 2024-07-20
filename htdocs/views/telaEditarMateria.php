<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
</head>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $id_materia = $_GET["id_materia"];

    $materiaModel = new materiaModel();

    $materia = $materiaModel->buscarMateriaPorId($id_materia);
?>
<body>
    <header>
        <h1>Editar Materia</h1>
        <?php require_once '../public/html/menuAdmin.html' ?>
    </header>
    <main>
        <form action="../routers/materiaRouter.php" method="post">
            <label for="descricao">Descricao</label>
            <br>
            <input type="text" name="descricao" id="descricao" value="<?= $materia->descricao; ?>">
            <br>
            <input type="hidden" name="id_materia" id="id_materia" value="<?= $materia->id_materia; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>