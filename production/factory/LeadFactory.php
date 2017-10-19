<?php 

	require_once "../class/Lead.php";

	class LeadFactory {

		public function criaLead($params) {						
			$id_market = $params["id_market"];
			$nome = $params["nome"];
			$email = $params["email"];
			$tel = $params["tel"];
			$cargo = $params["cargo"];
			return new Lead($id_market, $nome, $email ,$tel, $cargo);
		}	

	}

?>