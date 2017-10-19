<?php
	require_once "../factory/ProfissaoFactory.php";

	class ProfissaoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProfissoes() {
			$profissoes = array();			
			$resultado = mysqli_query($this->conexao, "select u.* from profissao as u");
			while($profissao_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProfissaoFactory();
				$profissao_id = $profissao_array['id_profissao'];				
				$profissao = $factory->criaProfissao($profissao_array);
				$profissao->setId($profissao_id);
				array_push($profissoes, $profissao);
			}
			return $profissoes;
		}

		function buscaProfissao($id) {
			$query = "select * from profissao where id_profissao = {$id}";
			$resultado = mysqli_query($this->conexao, $query);
			$profissao_buscada = mysqli_fetch_assoc($resultado);
			$id_profissao = $profissao_buscada['id_profissao'];
			$factory = new ProfissaoFactory();
			$profissao = $factory->criaProfissao($profissao_buscada);
			$profissao->setId($id_profissao);
			return $profissao;
		}		
	}

?>