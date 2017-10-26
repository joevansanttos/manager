<?php 
	
	require_once "../class/Departamento.php";

	class DepartamentoFactory {

		public function criaDepartamento($params) {
			$descricao = $params['descricao'];		
			return new Departamento($descricao);
		}	

		

}

?>