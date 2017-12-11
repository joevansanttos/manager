<?php 
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/PlanejamentoReceita.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";
	require_once "../dao/FilialDao.php";
	require_once "../dao/PlanejamentoDao.php";


class PlanejamentoReceitaFactory {

	public function cria($params) {
		$conexao = new Conexao();						
		$market_id = $params["market_id"];
		$marketDao = new MarketDao($conexao);
		$market = $marketDao->buscaMarket($market_id);
		$descricao = $params["descricao"];
		$categoria_id = $params["categoria_id"];
		$categoriaDao = new CategoriaDao($conexao);
		$categoria = $categoriaDao->buscaCategoriaRecebimento($categoria_id);
		$filial_id = $params["filial_id"];
		$filialDao = new FilialDao($conexao);
		$filial = $filialDao->busca($filial_id);			
		$data = $params["data"];
		$valor = $params["valor"];
		$pagamento_id = $params["pagamento_id"];
		$pagamentoDao = new PagamentoDao($conexao);
		$pagamento = $pagamentoDao->buscaPagamento($pagamento_id);
		$planejamento_id = $params["planejamento_id"];
		$planejamentoDao = new PlanejamentoDao($conexao);
		$planejamento = $planejamentoDao->busca($planejamento_id);
		$doc = $params["doc"];	
		return new PlanejamentoReceita($data, $descricao,  $valor, $categoria, $pagamento,  $filial, $market, $doc, $planejamento);
	}	

}

?>