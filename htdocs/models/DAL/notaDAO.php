<?php
    require_once 'conexao.php';

    class notaDAO {
        public function cadastrarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO nota VALUES(null, :id_usuario, :id_materia, :valor);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_usuario', $nota->id_usuario);
            $stmt->bindParam(':id_materia', $nota->id_materia);
            $stmt->bindParam(':valor', $nota->valor);
            return $stmt->execute();
        }

        public function buscarNotasPorId(int $id_usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM nota WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":id_usuario", $id_usuario);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarNotaPorId(notaModel $nota) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM nota WHERE id_usuario = :id_usuario AND id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_usuario', $nota->id_usuario);
            $stmt->bindParam(':id_materia', $nota->id_materia);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirNota(int $id_nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM nota WHERE id_nota = :id_nota";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_nota', $id_nota);
            return  $stmt->execute();
        }

        public function atualizarNota(notaModel $nota) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE nota SET valor = :valor WHERE id_usuario = :id_usuario AND id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $nota->id_usuario);
            $stmt->bindValue(':id_materia', $nota->id_materia);
            $stmt->bindValue(':valor', $nota->valor);

            return $stmt->execute();
        }

        
    }
?>