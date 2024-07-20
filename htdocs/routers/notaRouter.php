<?php
    require_once '../controllers/notaController.php';

    $notaController = new notaController();

    $rota = $_POST['rota'];

    switch($rota) {
        case "cadastrar":
            $id_usuario = ($_POST['id_usuario']);
            $id_materia = ($_POST['id_materia']);
            $valor = floatval($_POST['valor']);

            $notaController->cadastrarNota($id_usuario, $id_materia, $valor);

            break;
        case "excluir":
            $id_nota = intval($_POST['id_nota']);

            $notaController->excluirNota($id_nota);

            break;
        case "salvar":
            $id_usuario = $_POST['id_usuario'];
            $id_materia = $_POST['id_materia'];
            $valor = $_POST['valor'];


            $notaController->atualizarNota($id_usuario, $id_materia, $valor);

            break;
    }
?>