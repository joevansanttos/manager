<?php
	require_once "UsuarioFactory.php";
	
	class UsuarioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaUsuarios() {

			$usuarios = array();
			$resultado = mysqli_query($this->conexao, "select u.* from usuarios as u");
			while($usuario_array = mysqli_fetch_assoc($resultado)) {
				$factory = new UsuarioFactory();
				$usuario_id = $usuario_array['id_usuario'];				
				$usuario = $factory->criaUsuario($usuario_array);
				$usuario->setId($usuario_id);
				array_push($usuarios, $usuario);
			}

			return $usuarios;
		}

		function insereUsuario(Usuario $usuario) {
			$query = "insert into usuarios (nome, email, senha, sobrenome, sexo, estado, cidade, telefone) values ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}', '{$usuario->getSobrenome()}', '{$usuario->getSexo()}', '{$usuario->getEstado()}', '{$usuario->getCidade()}', '{$usuario->getTelefone()}' )";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}
	}
	

?>