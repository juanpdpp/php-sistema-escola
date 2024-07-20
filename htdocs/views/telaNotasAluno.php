<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Matérias</title>
</head>
<?php
    require_once '../models/notaModel.php';

    session_start();


    if ($_SESSION['esta_logado'] !== true){
        header('Location: login.php');
        exit();
    }

    $notaModel = new notaModel;
    $id_usuario = $_SESSION['id_usuario'];
    
    $notas = $notaModel->buscarNotasPorId($id_usuario);
    $qntDeMaterias = 0;
    $notaTotal = 0;
    foreach ($notas as $nota){
        $nota1 = $nota->valor;
        $notaTotal = $notaTotal + $nota1;
        $qntDeMaterias += 1;
    }

    if ($notaTotal !== 0) {
        $media = $notaTotal/$qntDeMaterias;
        $media = round($media,1);
    }

    ?>
<body>
    <header>
    <?php require_once "../public/html/menuAluno.html" ?>
        <h1>Listar Notas</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Matéria</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($notas as $nota) :?>
                    <tr>
                        <td><?= $nota->materia->descricao ?></td>
                        <td><?= $nota->valor ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if ($notaTotal !== 0) :?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Média: </b></td>
                    <td><b><?=$media?></b></td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>
    </main>
</body>
</html>