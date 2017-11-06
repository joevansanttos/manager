<?php 

	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Suspect.php";

	class SuspectFactory {

		public function criaSuspect($params) {
			$conexao = new Conexao();								
			$market_id = $params["market_id"];
			$marketDao = new MarketDao($conexao);
			$market = $marketDao->buscaMarket($market_id);
			$nome = $params["nome"];
			$email = $params["email"];
			$tel = $params["tel"];
			$status= $params["status"];
			$data= $params["data"];
			$hora= $params["hora"];
			return new Suspect($nome, $email ,$tel, $status, $data, $hora, $market);
		}	

	}

?>