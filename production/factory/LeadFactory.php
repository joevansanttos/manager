<?php 
	require_once "../class/Lead.php";
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";

	class LeadFactory {

		public function criaLead($params) {
			$conexao = new Conexao();						
			$market_id = $params["market_id"];
			$marketDao = new MarketDao($conexao);
			$market = $marketDao->buscaMarket($market_id);
			$nome = $params["nome"];
			$email = $params["email"];
			$tel = $params["tel"];
			$cargo = $params["cargo"];
			return new Lead($nome, $email ,$tel, $cargo, $market);
		}	

	}

?>