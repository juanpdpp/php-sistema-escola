<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Materias</title>
</head>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();

    $materias = $materiaModel->buscarMaterias();
?>
<body>
    <header>
        <h1>Listar Materias</h1>
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
                <?php foreach($materias as $materia) :?>
                    <tr>
                        <td><?= $materia->descricao; ?></td>
                        <td>
                            <a href="telaEditarMateria.php?id_materia=<?= $materia->id_materia; ?>">Editar</a>
                            <form action="../routers/materiaRouter.php" method="post">
                                <input type="hidden" name="id_materia" id="id_materia" value="<?= $materia->id_materia; ?>">
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