<?php 
require_once "../dao/PlanejamentoReceitaDao.php";
require_once "../dao/PlanejamentoDespesaDao.php";	
require_once "../class/Planejamento.php";

class PlanejamentoFactory {

	public function cria($params) {

		$ano = $params['ano'];
		return new Planejamento($ano);
	}	

}

?>