<?php 
	
	require_once "../class/Profissao.php";

	class ProfissaoFactory {

		public function criaProfissao($params) {
			$descricao = $params['descricao'];
			return new Profissao($descricao);
		}	

}

?>