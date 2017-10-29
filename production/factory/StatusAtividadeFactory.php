<?php 
	
	require_once "../class/StatusAtividade.php";

class StatusAtividadeFactory {

	public function criaStatusAtividade($params) {
		$descricao = $params['descricao'];
		$porcentagem = $params['porcentagem'];			
		return new StatusAtividade($descricao, $porcentagem);
	}	

}

?>