<?php
	require_once "../factory/ProdutoFactory.php";
	
	class ProdutoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProdutos() {

			$produtos = array();
			$resultado = mysqli_query($this->conexao, "select u.* from produtos as u");
			while($produto_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProdutoFactory();
				$produto_id = $produto_array['id_produto'];				
				$produto = $factory->criaProduto($produto_array);
				$produto->setId($produto_id);
				array_push($produtos, $produto);
			}

			return $produtos;
		}

		function buscaProduto($id) {
			$query = "select * from produtos where id_produto = {$id}";
			$resultado = mysqli_query($this->conexao, $query);
			$porte_buscado = mysqli_fetch_assoc($resultado);
			$id_porte = $porte_buscado['id_produto'];
			$factory = new ProdutoFactory();
			$porte = $factory->criaProduto($porte_buscado);
			$porte->setId($id_porte);
			return $porte;
		}		

	}
	

?>