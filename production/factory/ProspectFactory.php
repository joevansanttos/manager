<?php 
	require_once "../class/Prospect.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";

	class ProspectFactory {		

		public function criaProspect($params) {
			$conexao = new Conexao();	
			$market_id = $params["market_id"];
			$marketDao = new MarketDao($conexao);
			$market = $marketDao->buscaMarket($market_id);
			$prob = $params["prob"];
			$valorOp = $params["valor_op"];
			$valorEs = $params["valor_est"];
			$recebimento= $params["recebimento"];
			$fechamento = $params["fechamento"];
			$produto_id = $params["produto_id"];
			$produtoDao = new ProdutoDao($conexao);
			$produto = $produtoDao->buscaProduto($produto_id);			
			return new Prospect($prob, $valorOp, $valorEs, $recebimento, $fechamento,  $produto, $market);
		}	

	}

?>