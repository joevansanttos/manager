<?php
	require_once "../class/Produto.php";

	class ProdutoFactory {

		public function criaProduto($params) {
			$conexao = mysqli_connect("127.0.0.1", "root", "", "manager");			
			$nome = $params["nome"];
			$descricao = $params["descricao"];
			$beneficios = $params["beneficios"];
			$entregas = $params["entregas"];
			$preco = $params["preco"];
			return new Produto($nome, $descricao, $beneficios, $entregas, $preco	);
		}	

	}

?>