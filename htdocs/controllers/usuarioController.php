<?php
    require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarUsuario(string $email, string $senha) {
            $email = str_replace(' ', '', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($email, $senha);
        
            session_start();
            
            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];
                $_SESSION['id_usuario'] = $retorno['id_usuario'];

                if ($retorno['id_tipo_suario'] === 1) {
                    header('Location: ../views/telaCadastroUsuario.php');
                }
                else {
                    header('Location: ../views/telaPrincipal.php');
                }
            }
            else {
                header('Location: ../views/telaLogin.php');
            }
            
            exit();
        }

        public function cadastrarUsuario(string $nome, string $email, string $senha) {
            $email = str_replace(' ','', $email);
            $senha = md5(str_replace(' ','', $senha));

            $usuarioModel = new usuarioModel();

            $retorno = $usuarioModel->verificarEmail($email);

            if ($retorno == 0) {
                $usuario = new usuarioModel(null, null, $nome, $email, $senha);

                $retorno = $usuarioModel->cadastrarUsuario($usuario);
    
                if ($retorno) {
                    header('Location: ../views/telaPrincipal.php');
                }
                else {
                    header('Location: ../views/telaCadastroUSuario.php');
                }
    
                exit();
            } 
            else {
                header('Location: ../views/telaCadastroUsuario.php');
            }

            exit();
        }



        
        public function excluirUsuario(int $id_usuario) {
            $usuarioModel = new usuarioModel();

            $usuarioModel->excluirUsuario($id_usuario);

            header('Location: ../views/telaPrincipal.php');
            exit();
        }

        public function atualizarUsuario(int $id_usuario, int $id_tipo_usuario, string $nome, string $email, string $senha) {
            $senha = md5(str_replace(' ', '', $senha));

            $UsuarioModel = new UsuarioModel();

            $usuario = new usuarioModel($id_usuario, $id_tipo_usuario, $nome, $email, $senha);

            $retorno = $UsuarioModel->atualizarUsuario($usuario);

            if ($retorno) {
                header('Location: ../views/telaListarUsuarios.php');
            }
            else {
                header("Location: ../views/telaEditarUsuario.php?id_usuario=$id_usuario");
            }

            exit();
        }

        public function atualizarDados(int $id_usuario, string $nome, string $email) {
            $UsuarioModel = new UsuarioModel();

            $usuario = new usuarioModel($id_usuario, null, $nome, $email, null);

            $retorno = $UsuarioModel->atualizarDados($usuario);

            if ($retorno) {
                header('Location: ../views/telaPrincipal.php');
            }
            else {
                header("Location: ../views/telaAlteraçãoDadosAluno.php");
            }

            exit();
        }

        public function atualizarSenha(int $id_usuario, string $senha) {
            $senha = md5(str_replace(' ', '', $senha));
            
            $UsuarioModel = new UsuarioModel();

            $usuario = new usuarioModel($id_usuario,null,null,null, $senha);

            $retorno = $UsuarioModel->atualizarSenha($usuario);

            if ($retorno) {
                header('Location: ../views/telaPrincipal.php');
            }
            else {
                header("Location: ../views/telaAlteraçãoDadosAluno.php");
            }

            exit();
        }

        
    }
?>