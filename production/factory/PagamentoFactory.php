<?php 
	
require_once "../class/Pagamento.php";

class PagamentoFactory {

	public function criaPagamento($params) {

		$descricao = $params['descricao'];		
		return new Pagamento($descricao);
	}	

}

?>