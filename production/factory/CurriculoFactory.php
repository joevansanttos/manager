<?php
	require_once "../class/Curriculo.php";
	require_once "../class/Conexao.php";

	class CurriculoFactory {

		public function cria($params) {
			$conexao = new Conexao();	
			$nome = $params['nome'];
			$email = $params['email'];		
			$sobrenome = $params['sobrenome'];
			$sexo = $params['sexo'];
			$estado = $params['estado'];
			$cidade = $params['cidade'];
			$telefone = $params['telefone'];
			$idade = $params['idade'];	
			$filhos = $params['filhos'];	
			$endereco = $params['endereco'];
			$objetivo = $params['objetivo'];
			$curso = $params['curso'];
			$conclusao = $params['conclusao'];
			$ano = $params['ano'];
			$empresa1 = $params['empresa1'];
			$entrada1 = $params['entrada1'];
			$universidade = $params['universidade'];
			$saida1 = $params['saida1'];
			$cargo1 = $params['cargo1'];
			$empresa2 = $params['empresa2'];
			$entrada2 = $params['entrada2'];
			$saida2 = $params['saida2'];
			$cargo2 = $params['cargo2'];
			$qualificacoes = $params['qualificacoes'];
			return new Curriculo($nome ,$email,  $sobrenome, $sexo, $estado, $cidade, $telefone, $idade, $filhos, $endereco, $objetivo, $curso, $universidade, $conclusao, $ano, $empresa1, $entrada1, $saida1, $cargo1, $empresa2, $entrada2, $saida2, $cargo2, $qualificacoes);
		}	

	}

?>