<?php
	require "../class/Usuario.php";
	require "../dao/ProfissaoDao.php";
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
			$id_profissao = $params['profissao'];
			$profissaoDao = new ProfissaoDao($conexao->conecta());
			$profissao = $profissaoDao->buscaProfissao($id_profissao);			
			return new Usuario($nome ,$email, $senha, $sobrenome, $sexo, $estado, $cidade, $telefone, $profissao);
		}	

	}

?>