<?php
    require_once 'conexao.php';

    class tipoUsuarioDAO {
        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "INSERT INTO tipo_usuario VALUES (null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricao', $tipoUsuario->descricao);

            return $stmt->execute();
        }

        public function buscarTiposUsuario() {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM tipo_usuario";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirTipoUsuario(int $id_tipo_usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "DELETE FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);

            return $stmt->execute();
        }

        public function buscarTipoUsuarioPorId(int $id_tipo_usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function atualizarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "UPDATE tipo_usuario SET descricao = :descricao WHERE id_tipo_usuario = :id_tipo_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_tipo_usuario', $tipoUsuario->id_tipo_usuario);
            $stmt->bindValue(':descricao', $tipoUsuario->descricao);

            return $stmt->execute();
        }
    }
?>