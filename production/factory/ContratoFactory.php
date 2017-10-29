<?php 
	require_once "../class/Contrato.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../class/Market.php";
	require_once "../dao/MarketDao.php";
	require_once "../dao/StatusContratoDao.php";
	require_once "../class/Conexao.php";

	class ContratoFactory {

		public function criaContrato($params) {
			$conexao = new Conexao();
			$market_id = $params["market_id"];
			$marketDao = new MarketDao($conexao);
			$market = $marketDao->buscaMarket($market_id);
			$produtoDao = new ProdutoDao($conexao);
			$produto_id= $params["produto_id"];	
			$produto = $produtoDao->buscaProduto($produto_id);	
			$status_contrato_id= $params["status_contrato_id"];
			$statusContratoDao = new StatusContratoDao($conexao);
			$status_contrato = $statusContratoDao->buscaStatusContrato($status_contrato_id);
			$inicio = $params["inicio"];
			$fim = $params["fim"];			
			$numero = $params["id"];
			$sede= $params["sede"];
			$razao = $params["razao"];
			$cnpj = $params["cnpj"];	
			return new Contrato($inicio, $fim, $numero, $sede, $razao, $cnpj, $produto, $market, $status_contrato);
		}	

	}

?>