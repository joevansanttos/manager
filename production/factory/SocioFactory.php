<?php
	require_once "../class/Socio.php";

	class SocioFactory {

		public function criaSocio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato) {
		
			   
			   return new Socio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato);
			

			
			
		}	

	}

?>