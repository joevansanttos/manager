<?php
require_once "../factory/CategoriaFactory.php";

class CategoriaDao{
	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	
	function listaCategoriasRecebimento() {
		$categorias = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from categorias_recebimento order by descricao");
		while($categoria_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CategoriaFactory();
			$categoria_id = $categoria_array['id'];
			$categoria = $factory->criaCategoriaRecebimento($categoria_array);				
			$categoria->setId($categoria_id);
			array_push($categorias, $categoria);
		}

		return $categorias;
	}

	function listaCategoriasDespesa() {
		$categorias = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from categorias_despesa order by descricao");
		while($categoria_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CategoriaFactory();
			$categoria_id = $categoria_array['id'];
			$categoria = $factory->criaCategoriaDespesa($categoria_array);				
			$categoria->setId($categoria_id);
			array_push($categorias, $categoria);
		}

		return $categorias;
	}

	function listaCategoriasCusto() {
		$categorias = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from categorias_custo order by descricao");
		while($categoria_array = mysqli_fetch_assoc($resultado)) {
			$factory = new CategoriaFactory();
			$categoria_id = $categoria_array['id'];
			$categoria = $factory->criaCategoriaCusto($categoria_array);				
			$categoria->setId($categoria_id);
			array_push($categorias, $categoria);
		}

		return $categorias;
	}


	function buscaCategoriaRecebimento($id) {
		$query = "select * from categorias_recebimento where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$categoria_buscada = mysqli_fetch_assoc($resultado);
		$categoria_id = $categoria_buscada['id'];
		$factory = new CategoriaFactory();
		$categoria = $factory->criaCategoriaRecebimento($categoria_buscada);
		$categoria->setId($categoria_id);
		return $categoria;
	}		


	function buscaCategoriaCusto($id) {
		$query = "select * from categorias_custo where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$categoria_buscada = mysqli_fetch_assoc($resultado);
		$categoria_id = $categoria_buscada['id'];
		$factory = new CategoriaFactory();
		$categoria = $factory->criaCategoriaCusto($categoria_buscada);
		$categoria->setId($categoria_id);
		return $categoria;
	}		
	

	function buscaCategoriaDespesa($id) {
		$query = "select * from categorias_despesa where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$categoria_buscada = mysqli_fetch_assoc($resultado);
		$categoria_id = $categoria_buscada['id'];
		$factory = new CategoriaFactory();
		$categoria = $factory->criaCategoriaDespesa($categoria_buscada);
		$categoria->setId($categoria_id);
		return $categoria;
	}		
}

?>