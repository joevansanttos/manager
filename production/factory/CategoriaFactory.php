<?php 
	
require_once "../class/Categoria.php";
require_once "../class/CategoriaRecebimento.php";
require_once "../class/CategoriaDespesa.php";
require_once "../class/CategoriaCusto.php";

class CategoriaFactory {


	public function criaCategoriaRecebimento($params) {
		$descricao = $params['descricao'];		
		return new CategoriaRecebimento($descricao);
	}	

	public function criaCategoriaDespesa($params) {
		$descricao = $params['descricao'];		
		return new CategoriaDespesa($descricao);
	}	

	public function criaCategoriaCusto($params) {
		$descricao = $params['descricao'];		
		return new CategoriaCusto($descricao);
	}	

}

?>