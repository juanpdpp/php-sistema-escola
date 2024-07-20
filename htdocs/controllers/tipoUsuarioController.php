<?php
    require_once '../models/tipoUsuarioModel.php';

    class tipoUsuarioController {
        public function cadastrarTipoUsuario(string $descricao) {
            $tipoUsuarioModel = new tipoUsuarioModel();
            $tipoUsuario = new tipoUsuarioModel(null, $descricao);

            $retorno = $tipoUsuarioModel->cadastrarTipoUsuario($tipoUsuario);

            if ($retorno) {
                header('Location: ../views/telaPrincipal.php');
            }
            else {
                header('Location: ../views/telaCadastroTipoUsuario.php');
            }

            exit();
        }

        public function excluirTipoUsuario(int $id_tipo_usuario) {
            $tipoUsuarioModel = new tipoUsuarioModel();

            $tipoUsuarioModel->excluirTipoUsuario($id_tipo_usuario);

            header('Location: ../views/telaPrincipal.php');
            exit();
        }

        public function atualizarTipoUsuario(int $id_tipo_usuario, string $descricao) {
            $tipoUsuarioModel = new tipoUsuarioModel();

            $tipoUsuario = new tipoUsuarioModel($id_tipo_usuario, $descricao);

            $retorno = $tipoUsuarioModel->atualizarTipoUsuario($tipoUsuario);

            if ($retorno) {
                header('Location: ../views/telaListarTiposUsuario.php');
            }
            else {
                header("Location: ../views/telaEditarTipoUsuario.php?id_tipo_usuario=$id_tipo_usuario");
            }

            exit();
        }
    }
?>