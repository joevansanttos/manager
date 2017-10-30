<?php 
	require_once "../class/Conexao.php";
	require_once "../class/Historico.php";
	require_once "../dao/MarketDao.php";

class HistoricoFactory {

	public function criaHistorico($params) {
		$conexao = new Conexao();						
		$descricao = $params["descricao"];
		$data = $params["data"];
		$market_id = $params["market_id"];
		$marketDao = new MarketDao($conexao);
		$market = $marketDao->buscaMarket($market_id);
		return new Historico($descricao, $data, $market);
	}	

}

?>