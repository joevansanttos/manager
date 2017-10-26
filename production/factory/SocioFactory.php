<?php
require_once "../class/Socio.php";
require_once "../class/Contrato.php";
require_once "../dao/ContratoDao.php";

class SocioFactory {

	public function criaSocio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato) {
		$contrato_id = $contrato->getNumero();
		$conexao = mysqli_connect("localhost", "root", "", "manager");	
		$contratoDao = new ContratoDao($conexao);
		$contrato = $contratoDao->buscaContrato($contrato_id);
		return new Socio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato);
	}	

}

?>