<?php 
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Recebimento.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";

class RecebimentoFactory {

	public function criaRecebimento($params) {
		$conexao = new Conexao();						
		$market_id = $params["market_id"];
		$marketDao = new MarketDao($conexao);
		$market = $marketDao->buscaMarket($market_id);
		$descricao = $params["descricao"];
		$categoria_id = $params["categoria_id"];
		$categoriaDao = new CategoriaDao($conexao);
		$categoria = $categoriaDao->buscaCategoria($categoria_id);		
		$data = $params["data"];
		$valor = $params["valor"];
		$pagamento_id = $params["pagamento_id"];
		$pagamentoDao = new PagamentoDao($conexao);
		$pagamento = $pagamentoDao->buscaPagamento($pagamento_id);
		$pago_id = $params["pago_id"];
		$pagoDao = new PagoDao($conexao);
		$pago = $pagoDao->buscaPago($pago_id);
		$image = $params["image"];	
		return new Recebimento($data, $descricao,  $valor, $categoria, $pagamento, $pago, $market, $image);
	}	

}

?>