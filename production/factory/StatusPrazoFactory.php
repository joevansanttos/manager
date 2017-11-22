<?php 
	
	require_once "../class/StatusPrazo.php";

class StatusPrazoFactory {

	public function cria($params) {
		$descricao = $params['descricao'];
		return new StatusPrazo($descricao);
	}	

}

?>