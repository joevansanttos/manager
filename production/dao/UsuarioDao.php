<?php
	require_once "../factory/UsuarioFactory.php";
	
	class UsuarioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao->conecta();
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
			$query = "insert into usuarios (nome, email, senha, sobrenome, sexo, estado, cidade, telefone, profissao) values ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}', '{$usuario->getSobrenome()}', '{$usuario->getSexo()}', '{$usuario->getEstado()}', '{$usuario->getCidade()}', '{$usuario->getTelefone()}', '{$usuario->getProfissao()->getId()}'  )";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		function buscaCidade($cidade){
			$query = "select  * from cidade where CT_IBGE = '{$cidade}'";
			$resultado = mysqli_query($this->conexao, $query);
			$novaCidade = mysqli_fetch_assoc($resultado);
			return $novaCidade['CT_NOME'];
			
		}

		function buscaUsuarioLogar($email, $senha){
		    $query = "select  * from usuarios where email = '{$email}' and senha= '{$senha}'";
		    $resultado = mysqli_query($this->conexao, $query);
		    $usuario = mysqli_fetch_assoc($resultado);
		    return $usuario;

		}
	}
	

?>