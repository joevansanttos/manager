<?php
	require_once "../factory/CategoriaFactory.php";

	class CategoriaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaCategorias() {
			$categorias = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from categorias as u");
			while($categoria_array = mysqli_fetch_assoc($resultado)) {
				$factory = new CategoriaFactory();
				$categoria_id = $categoria_array['id'];
				$categoria = $factory->criaCategoria($categoria_array);				
				$categoria->setId($categoria_id);
				array_push($categorias, $categoria);
			}

			return $categorias;
		}

		function buscaCategoria($id) {
			$query = "select * from categorias where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$categoria_buscada = mysqli_fetch_assoc($resultado);
			$categoria_id = $categoria_buscada['id'];
			$factory = new CategoriaFactory();
			$categoria = $factory->criaCategoria($categoria_buscada);
			$categoria->setId($categoria_id);
			return $categoria;
		}		
	}

?>