<?php 
	
	require_once "../class/Porte.php";

class PorteFactory {

	public function criaPorte($params) {

		$descricao = $params['descricao'];		
		return new Porte($descricao);
	}	

}

?>