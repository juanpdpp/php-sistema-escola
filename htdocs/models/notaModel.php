<?php
    require_once 'DAL/notaDAO.php';
    require_once 'materiaModel.php';

    class notaModel {
        public ?int $id_nota;
        public ?int $id_usuario;
        public ?int $id_materia;
        public ?float $valor;
        public ?materiaModel $materia;



        public function __construct(?int $id_nota = null, ?int $id_usuario = null, ?int $id_materia = null,  ?float $valor = null, ?materiaModel $materia = null) {
            $this->id_nota = $id_nota;
            $this->id_usuario = $id_usuario;
            $this->id_materia = $id_materia;
            $this->valor = $valor;
            $this->materia = $materia;
        }

        public function cadastrarNota(notaModel $nota) {
            $notaDAO = new notaDAO();

            return $notaDAO->cadastrarNota($nota);
        }

        public function buscarNotasPorId(int $id_usuario) {
            $notaDAO = new notaDAO();

            $materiaModel = new materiaModel();

            $notas = $notaDAO->buscarNotasPorId($id_usuario);
        
            foreach ($notas as $chave => $nota) {
                $notas[$chave] = new notaModel(
                    $nota['id_nota'],
                    $nota['id_usuario'],
                    $nota['id_materia'],
                    $nota['valor'],
                    $materiaModel->buscarMateriaPorId($nota['id_materia'])
                );
            }

            return $notas;
        }

        public function buscarNotaPorId(self $nota) {
            $notaDAO = new notaDAO();
            $materiaModel = new materiaModel();

            $nota = $notaDAO->buscarNotaPorId($nota);

            $nota = new notaModel(
                $nota['id_nota'],
                $nota['id_usuario'],
                $nota['id_materia'],
                $nota['valor'],
                $materiaModel->buscarMateriaPorId($nota['id_materia'])
            );

            return $nota;
            }

            public function excluirNota(int $id_nota) {
                $notaDAO = new notaDAO();
    
                return $notaDAO->excluirNota($id_nota);
            }

            public function atualizarNota(notaModel $nota) {
                $notaDAO = new notaDAO();
    
                return $notaDAO->atualizarNota($nota);
            }
        }
?>