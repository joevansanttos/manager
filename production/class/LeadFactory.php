<?php 

	require_once "Lead.php";

	class LeadFactory {

		public function criaLead($params) {	
			$conexao = mysqli_connect("127.0.0.1", "root", "", "manager");		
			$id_market = $_POST["id"];
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$tel = $_POST["tel"];
			$cargo = $_POST["cargo"];
			return new Lead($id_market, $nome, $email $tel, $cargo);
		}	

	}

?>