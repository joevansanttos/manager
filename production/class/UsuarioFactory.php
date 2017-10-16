<?php 
	
	require_once "Usuario.php";

class UsuarioFactory {

	public function criaUsuario($params) {

		$nome = $params['nome'];
		$email = $params['email'];		
		$senha = $params['senha'];
		$sobrenome = $params['sobrenome'];
		$sexo = $params['sexo'];
		$estado = $params['estado'];
		$cidade = $params['cidade'];
		$telefone = $params['telefone'];
		
		return new Usuario($nome ,$email, $senha, $sobrenome, $sexo, $estado, $cidade, $telefone);
	}	

}

?>