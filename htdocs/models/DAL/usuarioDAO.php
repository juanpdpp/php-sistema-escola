<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(string $email, string $senha) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;
        }

        public function cadastrarUsuario(usuarioModel $usuario) {
            $conexao = (new Conexao())->getConexao(); 

            $sql = "INSERT INTO usuario (id_tipo_usuario, nome, email, senha) VALUES (:id_tipo_usuario, :nome, :email, :senha)";
        
            $stmt = $conexao->prepare($sql);
        
            $id_tipo_usuario = 2;
            $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);
            $stmt->bindParam(':nome', $usuario->nome);
            $stmt->bindParam(':email', $usuario->email);
            $stmt->bindParam(':senha', $usuario->senha);
        
            return $stmt->execute();
        }

        public function verificarEmail(string $email) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE email = :email";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $email);
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno['total'] = 0;
        }
        
        public function excluirUsuario(int $id_usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            return  $stmt->execute();
        }

        public function atualizarUsuario(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario SET id_usuario = :id_usuario, id_tipo_usuario = :id_tipo_usuario, nome = :nome, email = :email, senha = :senha WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $usuario->id_usuario);
            $stmt->bindValue(':id_tipo_usuario', $usuario->id_tipo_usuario);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);
            $stmt->bindValue(':senha', $usuario->senha);

            return $stmt->execute();
        }

        public function atualizarDados(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario SET nome = :nome, email = :email WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $usuario->id_usuario);
            $stmt->bindValue(':nome', $usuario->nome);
            $stmt->bindValue(':email', $usuario->email);

            return $stmt->execute();
        }

        public function atualizarSenha(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "UPDATE usuario SET senha = :senha WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_usuario', $usuario->id_usuario);
            $stmt->bindValue(':senha', $usuario->senha);

            return $stmt->execute();
        }

        public function buscarUsuarios() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarUsuarioPorId(int $id_usuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function buscarAlunos() {
            $conexao = (new conexao)->getConexao();

            $sql = 'SELECT * FROM usuario WHERE id_tipo_usuario = 2';

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>