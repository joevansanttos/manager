<?php
	require_once "../class/Produto.php";
	require_once "../class/Conexao.php";

	class ProdutoFactory {

		public function criaProduto($params) {
			$conexao = new Conexao();
			$nome = $params["nome"];
			$descricao = $params["descricao"];
			$beneficios = $params["beneficios"];
			$entregas = $params["entregas"];
			$preco = $params["preco"];
			return new Produto($nome, $descricao, $beneficios, $entregas, $preco	);
		}	

	}

?>