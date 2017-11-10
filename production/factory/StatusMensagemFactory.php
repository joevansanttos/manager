<?php 
	
	require_once "../class/StatusMensagem.php";

class StatusMensagemFactory {

	public function criaStatusMensagem($params) {
		$descricao = $params['descricao'];
		return new StatusMensagem($descricao);
	}	

}

?>