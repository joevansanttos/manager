<?php 
	
require_once "../class/Categoria.php";

class CategoriaFactory {

	public function criaCategoria($params) {

		$descricao = $params['descricao'];		
		return new Categoria($descricao);
	}	

}

?>