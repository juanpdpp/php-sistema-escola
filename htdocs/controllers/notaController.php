<?php
    require_once '../models/notaModel.php';

    class notaController {
        public function cadastrarNota(int $id_usuario, int $id_materia, float $valor) {
            $notaModel = new notaModel();

            $nota = new notaModel(null, $id_usuario, $id_materia, $valor);

            $retorno = $notaModel->cadastrarNota($nota);

            if ($retorno) {
                header('Location: ../views/telaListarNotas.php');
            }
            else {
                header('Location: ../views/telaCadastroNotas.php');
            }

            exit();
        }

        public function excluirNota(int $id_nota) {
            $notaModel = new notaModel();

            $notaModel->excluirNota($id_nota);

            header('Location: ../views/telaListarNotas.php');
            exit();
        }

        public function atualizarNota(int $id_usuario, int $id_materia, float $valor) {
            $notaModel = new notaModel();

            $nota = new notaModel(null, $id_usuario, $id_materia, $valor, null);

            $retorno = $notaModel->atualizarNota($nota);

            if ($retorno) {
                header('Location: ../views/telaListarNotas.php');
            }
            else {
                header("Location: ../views/telaEditarNotas.php?id_usuario=$id_usuario
                ");
            }

            exit();
        }
    }
?>