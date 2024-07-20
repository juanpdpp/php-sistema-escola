<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $id_materia;
        public ?string $descricao;

        public function __construct(?int $id_materia = null, ?string $descricao = null) {
            $this->id_materia = $id_materia;
            $this->descricao = $descricao;
        }

        public function cadastrarMateria(materiaModel $materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->cadastrarMateria($materia);
        }

        public function buscarMaterias() {
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMaterias();
        
            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel(
                    $materia['id_materia'],
                    $materia['descricao'],
                );
            }

            return $materias;
        }

        public function buscarMateriaPorId(int $id_materia) {
            $materiaDAO = new materiaDAO();

            $materia = $materiaDAO->buscarMateriaPorId($id_materia);

            $materia = new materiaModel(
                $materia['id_materia'],
                $materia['descricao'],
            );

            return $materia;
        }

        public function excluirMateria(int $id_materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->excluirMateria($id_materia);
        }

        public function atualizarMateria(materiaModel $materia) {
            $materiaDAO = new materiaDAO();

            return $materiaDAO->atualizarMateria($materia);
        }
    }
?>