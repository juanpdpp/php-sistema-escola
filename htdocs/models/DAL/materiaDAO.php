<?php
    require_once 'conexao.php';

    class materiaDAO {
        public function cadastrarMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO materia VALUES(null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':descricao', $materia->descricao);
            return $stmt->execute();
        }

        public function buscarMaterias() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarMateriaPorId(int $id_materia) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM materia WHERE id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_materia', $id_materia);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirMateria(int $id_materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM materia WHERE id_materia = :id_materia";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_materia', $id_materia);
            return  $stmt->execute();
        }

        public function atualizarMateria(materiaModel $materia) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE materia SET id_materia = :id_materia, descricao = :descricao WHERE id_materia = :id_materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_materia', $materia->id_materia);
            $stmt->bindValue(':descricao', $materia->descricao);

            return $stmt->execute();
        }
    }
?>