<?php
    require_once 'DAL/usuarioDAO.php';

    class usuarioModel {
        public ?int $id_usuario;
        public ?int $id_tipo_usuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;

        public function __construct(?int $id_usuario = null, ?int $id_tipo_usuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->id_usuario = $id_usuario;
            $this->id_tipo_usuario = $id_tipo_usuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($email, $senha);
        
            return $retorno;
        }

        public function cadastrarUsuario(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->cadastrarUsuario($usuario);
        }
        
        public function verificarEmail(string $email){
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->verificarEmail($email);
        }

        public function excluirUsuario(int $id_usuario) {
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->excluirUsuario($id_usuario);
        }

        public function atualizarUsuario(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->atualizarUsuario($usuario);
        }

        public function atualizarDados(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->atualizarDados($usuario);
        }

        public function atualizarSenha(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();

            return $usuarioDAO->atualizarSenha($usuario);
        }

        public function buscarUsuarios() {
            $usuarioDAO = new usuarioDAO();

            $usuarios = $usuarioDAO->buscarUsuarios();
        
            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha']
                );
            }

            return $usuarios;
        }

        public function buscarUsuarioPorId(int $id_usuario) {
            $usuarioDAO = new usuarioDAO();

            $usuario = $usuarioDAO->buscarUsuarioPorId($id_usuario);

            $usuario = new usuarioModel(
                $usuario['id_usuario'],
                $usuario['id_tipo_usuario'],
                $usuario['nome'],
                $usuario['email'],
                $usuario['senha']
            );

            return $usuario;
        }

        public function buscarAlunos() {
            $usuarioDAO = new usuarioDAO;

            $usuarios = $usuarioDAO->buscarUsuarios();

            foreach ($usuarios as $chave => $usuario) {
                $usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha']);
                }
                return $usuarios;
            }
    }
?>