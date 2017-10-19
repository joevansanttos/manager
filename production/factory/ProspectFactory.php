<?php 
	require_once "../class/Prospect.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";

	class ProspectFactory {
		

		public function criaProspect($params) {	
			$conexao = mysqli_connect("127.0.0.1", "root", "", "manager");						
			$id_market = $params["id_market"];
			$prob = $params["prob"];
			$valorOp = $params["valor_op"];
			$valorEs = $params["valor_est"];
			$recebimento= $params["recebimento"];
			$fechamento = $params["fechamento"];
			$id_produto= $params["id_produto"];
			$produtoDao = new ProdutoDao($conexao);
			$produto = $produtoDao->buscaProduto($id_produto);			
			return new Prospect($id_market, $prob, $valorOp, $valorEs, $recebimento, $fechamento,  $produto);
		}	

	}

?>