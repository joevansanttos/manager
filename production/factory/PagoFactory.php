<?php 
	
require_once "../class/Pago.php";

class PagoFactory {

	public function criaPago($params) {

		$descricao = $params['descricao'];		
		return new Pago($descricao);
	}	

}

?>