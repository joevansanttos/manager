<?php 
	
	require_once "Porte.php";

class PorteFactory {

	public function criaPorte($params) {

		$descricao = $params['descricao'];		
		return new Porte($descricao);
	}	

}

?>