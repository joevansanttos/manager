<?php
	require_once "../factory/ProfissaoFactory.php";


	class ProfissaoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProfissoes() {
			$profissoes = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from profissao as u order by descricao");
			while($profissao_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProfissaoFactory();
				$id = $profissao_array['id'];				
				$profissao = $factory->criaProfissao($profissao_array);
				$profissao->setId($id);
				array_push($profissoes, $profissao);
			}
			return $profissoes;
		}

		function buscaProfissao($id) {
			$query = "select * from profissao where id = '{$id}'";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$profissao_buscada = mysqli_fetch_assoc($resultado);
			$id = $profissao_buscada['id'];
			$factory = new ProfissaoFactory();
			$profissao = $factory->criaProfissao($profissao_buscada);			
			$profissao->setId($id);
			return $profissao;
		}		
	}

?>