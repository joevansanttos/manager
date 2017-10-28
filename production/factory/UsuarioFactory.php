<?php
	require_once "../class/Usuario.php";
	require_once "../dao/ProfissaoDao.php";
	require_once "../class/Conexao.php";

	class UsuarioFactory {

		public function criaUsuario($params) {
			$conexao = new Conexao();	
			$nome = $params['nome'];
			$email = $params['email'];		
			$senha = $params['senha'];
			$sobrenome = $params['sobrenome'];
			$sexo = $params['sexo'];
			$estado = $params['estado'];
			$cidade = $params['cidade'];
			$telefone = $params['telefone'];
			$profissao_id = $params['profissao_id'];
			$profissaoDao = new ProfissaoDao($conexao);
			$profissao = $profissaoDao->buscaProfissao($profissao_id);
			return new Usuario($nome ,$email, $senha, $sobrenome, $sexo, $estado, $cidade, $telefone, $profissao);
		}	

	}

?>