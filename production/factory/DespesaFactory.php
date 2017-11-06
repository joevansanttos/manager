<?php 
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Despesa.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";

class DespesaFactory {

	public function criaDespesa($params) {
		$conexao = new Conexao();						
		$descricao = $params["descricao"];
		$categoria_id = $params["categoria_id"];
		$categoriaDao = new CategoriaDao($conexao);
		$categoria = $categoriaDao->buscaCategoria($categoria_id);		
		$data = $params["data"];
		$valor = $params["valor"];
		$fornecedor = $params["fornecedor"];
		$pagamento_id = $params["pagamento_id"];
		$pagamentoDao = new PagamentoDao($conexao);
		$pagamento = $pagamentoDao->buscaPagamento($pagamento_id);
		$pago_id = $params["pago_id"];
		$pagoDao = new PagoDao($conexao);
		$pago = $pagoDao->buscaPago($pago_id);	
		return new Despesa($data, $descricao,  $valor, $categoria, $pagamento, $pago, $fornecedor);
	}	

}

?>