<?php 

	require_once "../class/Suspect.php";

	class SuspectFactory {

		public function criaSuspect($params) {						
			$id_market = $params["id_market"];
			$nome = $params["nome"];
			$email = $params["email"];
			$tel = $params["tel"];
			$status= $params["status"];
			$data= $params["data"];
			$hora= $params["hora"];
			return new Suspect($id_market, $nome, $email ,$tel, $status, $data, $hora);
		}	

	}

?>