<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $id_tipo_usuario;
        public ?string $descricao;

        public function __construct(?int $id_tipo_usuario = null, ?string $descricao = null) {
            $this->id_tipo_usuario = $id_tipo_usuario;
            $this->descricao = $descricao;
        }

        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->cadastrarTipoUsuario($tipoUsuario);
        }

        public function buscarTiposUsuario() {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tiposUsuario = $tipoUsuarioDAO->buscarTiposUsuario();

            foreach ($tiposUsuario as $chave => $tipoUsuario) {
                $tiposUsuario[$chave] = new tipoUsuarioModel($tipoUsuario['id_tipo_usuario'], $tipoUsuario['descricao']);
            }

            return $tiposUsuario;
        }

        public function excluirTipoUsuario(int $id_tipo_usuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->excluirTipoUsuario($id_tipo_usuario);
        }

        public function buscarTipoUsuarioPorId(int $id_tipo_usuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            $tipoUsuarioArray = $tipoUsuarioDAO->buscarTipoUsuarioPorId($id_tipo_usuario);
        
            $tipoUsuario = new tipoUsuarioModel($tipoUsuarioArray['id_tipo_usuario'], $tipoUsuarioArray['descricao']);

            return $tipoUsuario;
        }

        public function atualizarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $tipoUsuarioDAO = new tipoUsuarioDAO();

            return $tipoUsuarioDAO->atualizarTipoUsuario($tipoUsuario);
        }
    }
?>