<?php 

	require_once "Lead.php";

	class LeadFactory {

		public function criaLead($params) {	
			$conexao = mysqli_connect("localhost", "root", "", "manager");		
			$id_market = $params["id"];
			$nome = $params["nome"];
			$email = $params["email"];
			$tel = $params["tel"];
			$cargo = $params["cargo"];
			return new Lead($id_market, $nome, $email ,$tel, $cargo);
		}	

	}

?>