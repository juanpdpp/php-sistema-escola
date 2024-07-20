<?php
    require_once '../controllers/materiaController.php';

    $materiaController = new materiaController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $descricao = $_POST['descricao'];

            $materiaController->cadastrarMateria($descricao);

            break;
        case "excluir":
            $id_materia = intval($_POST['id_materia']);

            $materiaController->excluirMateria($id_materia);

            break;
        case "salvar":
            $id_materia = $_POST['id_materia'];
            $descricao = $_POST['descricao'];

            $materiaController->atualizarMateria($id_materia, $descricao);

            break;
    }
?>