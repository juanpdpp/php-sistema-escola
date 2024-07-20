<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
    <script src="../public/javascript/script.js" text="text/javascript"></script>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !== 1){
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel();
    $id_materia = $_GET['id_materia'];
    $id_usuario = $_GET['id_usuario'];
    $nota = new notaModel(null,$id_usuario,$id_materia,null,null);
    $nota = $notaModel->buscarNotaPorId($nota);

?>
<body>
    <header>
        <?php require_once "../public/html/menuAdmin.html"; ?>
        <h1>Editar Nota de <?= $nota->materia->descricao?></h1>
    </header>
    <main>
    <form action="../routers/notaRouter.php" method="post" onsubmit="return validarCamposEditarNota(event);">
            <label for="valor">Nota <?= $nota->materia->descricao ?>:</label>
            <br>
            <input type="number" name="valor" id="valor" value="<?=$nota->valor; ?>"required min="0" max="10" step=".1">
            <br>
            <br>
            <input type="hidden" name="id_materia" id="id_materia" value="<?=$nota->id_materia ?>">
            <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$nota->id_usuario ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>