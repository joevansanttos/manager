<?php 
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Recebimento.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";
	require_once "../dao/FilialDao.php";
	require_once "../dao/ContratoDao.php";

class RecebimentoFactory {

	public function criaRecebimento($params) {
		$conexao = new Conexao();						
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
		$pago_id = $params["pago_id"];
		$pagoDao = new PagoDao($conexao);
		$pago = $pagoDao->buscaPago($pago_id);
		$doc = $params["doc"];
		$contrato_id = $params["contrato_id"];
		$contratoDao = new ContratoDao($conexao);
		$contrato = $contratoDao->buscaContrato($contrato_id);			
		return new Recebimento($data, $descricao,  $valor, $categoria, $pagamento, $pago, $filial, $doc, $contrato);
	}	

}

?>