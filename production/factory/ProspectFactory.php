<?php 
	require_once "../class/Prospect.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../class/Conexao.php";

	class ProspectFactory {
		

		public function criaProspect($params) {
			$conexao = new Conexao();	
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