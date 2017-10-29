<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";
	
	
	$factory = new ContratoFactory();
	$contrato = $factory->criaContrato($_POST);
	$contratoDao = new ContratoDao($conexao);	
	$contratoDao->insereContrato($contrato);
	$contratoDao->insereSocios($contrato, $_POST);
	$contratoDao->insereDepartamentos($contrato, $_POST);
	header("Location: ../tables/contratos.php");
?>