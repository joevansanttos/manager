<?php 
	require_once "../class/Contrato.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../class/Cliente.php";
	require_once "../dao/ClienteDao.php";
	require_once "../class/Conexao.php";

	class ContratoFactory {

		public function criaContrato($params, $market_id) {
			$conexao = new Conexao();
			$clienteDao = new ClienteDao($conexao);
			$market = $clienteDao->buscaMarket($market_id);
			$inicio = $params["inicio"];
			$fim = $params["fim"];			
			$numero = $params["id"];
			$sede= $params["sede"];
			$razao = $params["razao"];
			$cnpj = $params["cnpj"];
			$produto_id= $params["produto_id"];
			$produtoDao = new ProdutoDao($conexao);
			$produto = $produtoDao->buscaProduto($produto_id);			
			return new Contrato($inicio, $fim, $numero, $sede, $razao, $cnpj, $produto, $market);
		}	

	}

?>