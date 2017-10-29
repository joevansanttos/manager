<?php 
	
	require_once "../class/StatusContrato.php";

class StatusContratoFactory {

	public function criaStatusContrato($params) {

		$descricao = $params['descricao'];		
		return new StatusContrato($descricao);
	}	

}

?>