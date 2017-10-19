<?php 
	require_once "../class/Contrato.php";
	require_once "../class/Produto.php";
	require_once "../dao/ProdutoDao.php";
	require_once "../class/Cliente.php";
	require_once "../dao/ClienteDao.php";

	class ContratoFactory {

		public function criaContrato($params, $market_id) {
			$conexao = mysqli_connect("localhost", "root", "", "manager");						
			$clienteDao = new ClienteDao($conexao);
			$market = $clienteDao->buscaMarket($market_id);
			$inicio = $params["inicio"];
			$fim = $params["fim"];			
			$numero = $params["numero"];
			$sede= $params["sede"];
			$razao = $params["razao"];
			$cnpj = $params["cnpj"];
			$produto_id= $params["produto"];
			$produtoDao = new ProdutoDao($conexao);
			$produto = $produtoDao->buscaProduto($produto_id);			
			return new Contrato($inicio, $fim, $numero, $sede, $razao, $cnpj, $produto, $market);
		}	

	}

?>