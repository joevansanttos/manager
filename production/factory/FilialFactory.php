<?php 
	
require_once "../class/Filial.php";

class FilialFactory {

	public function cria($params) {

		$nome = $params['nome'];		
		return new Filial($nome);
	}	

}

?>