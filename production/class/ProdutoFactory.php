<?php 
	
	
	require_once "Produto.php";


	class ProdutoFactory {

		public function criaProduto($params) {
			$conexao = mysqli_connect("127.0.0.1", "root", "", "manager");
			
			$nome = $params["nome"];
			$descricao = $params["descricao"];
			$beneficios = $params["beneficios"];
			$entregas = $params["entregas"];
			return new Produto($nome, $descricao, $beneficios, $entregas	);
		}	

	}

?>