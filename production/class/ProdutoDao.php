<?php
	require_once "ProdutoFactory.php";
	
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

	}
	

?>