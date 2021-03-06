<?php
	require_once "../factory/UsuarioFactory.php";
	require_once "../class/Bcrypt.php";
	
	class UsuarioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function buscaUsuarioEmail($email){
		    $query = "select  * from usuarios where email = '{$email}'";
		    $resultado = mysqli_query($this->conexao->conecta(), $query);
		    $usuario = mysqli_fetch_assoc($resultado);
		    $factory = new UsuarioFactory();
		    $usuario_id = $usuario['id'];				
		    $usuario = $factory->criaUsuario($usuario);
		    $usuario->setId($usuario_id);
		    return $usuario;

		}

		function buscaUsuario($id){
		    $query = "select  * from usuarios where id = {$id}";
		    $resultado = mysqli_query($this->conexao->conecta(), $query);
		    $usuario = mysqli_fetch_assoc($resultado);
		    $factory = new UsuarioFactory();
		    $usuario_id = $usuario['id'];
		    $usuario = $factory->criaUsuario($usuario);
		    $usuario->setId($usuario_id);
		    return $usuario;

		}

		function listaUsuarios() {
			$usuarios = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from usuarios order by nome");
			while($usuario_array = mysqli_fetch_assoc($resultado)) {
				$factory = new UsuarioFactory();
				$id = $usuario_array['id'];				
				$usuario = $factory->criaUsuario($usuario_array);
				$usuario->setId($id);
				array_push($usuarios, $usuario);
			}

			return $usuarios;
		}


		function listaConsultores() {
			$usuarios = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from usuarios where profissao_id = 1 or profissao_id = 3");
			while($usuario_array = mysqli_fetch_assoc($resultado)) {
				$factory = new UsuarioFactory();
				$id = $usuario_array['id'];				
				$usuario = $factory->criaUsuario($usuario_array);
				$usuario->setId($id);
				array_push($usuarios, $usuario);
			}

			return $usuarios;
		}

		function insereUsuario(Usuario $usuario) {
			
			$query = "insert into usuarios (nome, email, senha, sobrenome, sexo, estado, cidade, telefone, profissao_id, image) values ('{$usuario->getNome()}', '{$usuario->getEmail()}', '{$usuario->getSenha()}', '{$usuario->getSobrenome()}', '{$usuario->getSexo()}', '{$usuario->getEstado()}', '{$usuario->getCidade()}', '{$usuario->getTelefone()}', '{$usuario->getProfissao()->getId()}', '{$usuario->getImage()}'  )";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualizaUsuario(Usuario $usuario) {
			$query = "update usuarios set nome = '{$usuario->getNome()}', email = '{$usuario->getEmail()}' , senha = '{$usuario->getSenha()}', sobrenome = '{$usuario->getSobrenome()}', sexo = '{$usuario->getSexo()}' , estado = '{$usuario->getEstado()}' , cidade = '{$usuario->getCidade()}' , telefone = '{$usuario->getTelefone()}', profissao_id = '{$usuario->getProfissao()->getId()}', image = '{$usuario->getImage()}' where id = {$usuario->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaCidade($cidade){
			$query = "select  * from cidade where CT_IBGE = '{$cidade}'";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$novaCidade = mysqli_fetch_assoc($resultado);
			return $novaCidade['CT_NOME'];
			
		}

		function buscaUsuarioLogar($email, $senha){
		    $query = "select  * from usuarios where email = '{$email}'";
		    $resultado = mysqli_query($this->conexao->conecta(), $query);
		    $usuario = mysqli_fetch_assoc($resultado);
		    $hash = $usuario['senha'];
		    if(Bcrypt::check($senha, $hash)){
		    	$factory = new UsuarioFactory();
		    	$usuario_id = $usuario['id'];
		    	$usuario = $factory->criaUsuario($usuario);
		    	$usuario->setId($usuario_id);
		    	return $usuario;
		    }else{
		    	return null;
		    }
		}

		function buscaImagem($usuario_id){
		    $sql = "SELECT * FROM profileimg WHERE usuario_id = {$usuario_id}";
		    $resultado = mysqli_query($this->conexao->conecta(), $sql);
		    if($imagem = mysqli_fetch_assoc($resultado)) {
		    	return $imagem;
		    }else{
		    	return null;
		    }	
		    
		}

		function adicionaImagem($imgContent, $usuario){
		  $query = "insert into profileimg (image, usuario_id) VALUES ('$imgContent', {$usuario->getId()})";
		  mysqli_query($this->conexao->conecta(), $query);
		}


		function listaColaboradores() {
			$usuarios = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from usuarios where profissao_id != 4 order by nome ");
			while($usuario_array = mysqli_fetch_assoc($resultado)) {
				$factory = new UsuarioFactory();
				$id = $usuario_array['id'];				
				$usuario = $factory->criaUsuario($usuario_array);
				$usuario->setId($id);
				array_push($usuarios, $usuario);
			}

			return $usuarios;
		}
		


	}
	

?>