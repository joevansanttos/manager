<?php
require_once "../class/Socio.php";
require_once "../class/Contrato.php";
require_once "../dao/ContratoDao.php";
require_once "../class/Conexao.php";

class SocioFactory {

	public function criaSocio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato) {
		$conexao = new Conexao();		
		return new Socio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato);
	}	

}

?>