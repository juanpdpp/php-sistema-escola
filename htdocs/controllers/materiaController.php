<?php
    require_once '../models/materiaModel.php';

    class materiaController {
        public function cadastrarMateria(string $descricao) {
            $materiaModel = new materiaModel();

            $materia = new materiaModel(null, $descricao);

            $retorno = $materiaModel->cadastrarMateria($materia);

            if ($retorno) {
                header('Location: ../views/telaListarMaterias.php');
            }
            else {
                header('Location: ../views/telaCadastroMateria.php');
            }

            exit();
        }

        public function excluirMateria(int $id_materia) {
            $materiaModel = new materiaModel();

            $materiaModel->excluirMateria($id_materia);

            header('Location: ../views/telaListarMaterias.php');
            exit();
        }

        public function atualizarMateria(int $id_materia, string $descricao) {
            $materiaModel = new materiaModel();

            $materia = new materiaModel($id_materia, $descricao);

            $retorno = $materiaModel->atualizarMateria($materia);

            if ($retorno) {
                header('Location: ../views/telaListarMaterias.php');
            }
            else {
                header("Location: ../views/telaEditarMaterias.php?id_materia=$id_materia");
            }

            exit();
        }
    }
?>