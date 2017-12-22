<?php 
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Despesa.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";
	require_once "../dao/FornecedorDao.php";
	require_once "../dao/FilialDao.php";
	require_once "../dao/ContratoDao.php";


class DespesaFactory {

	public function criaDespesa($params) {
		$conexao = new Conexao();						
		$descricao = $params["descricao"];
		$categoria_id = $params["categoria_id"];
		$categoriaDao = new CategoriaDao($conexao);
		$categoria = $categoriaDao->buscaCategoriaDespesa($categoria_id);
		$filial_id = $params["filial_id"];
		$filialDao = new FilialDao($conexao);
		$filial = $filialDao->busca($filial_id);			
		$data = $params["data"];
		$valor = $params["valor"];
		$fornecedor_id = $params["fornecedor_id"];
		$fornecedorDao = new FornecedorDao($conexao);
		$fornecedor = $fornecedorDao->buscaFornecedor($fornecedor_id);
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
		return new Despesa($data, $descricao,  $valor, $categoria, $pagamento, $pago, $filial, $fornecedor, $doc, $contrato);
	}	

}

?>