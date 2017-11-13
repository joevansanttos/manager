<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";

	$contrato_id = $_GET['id'];
	$contratoDao = new ContratoDao($conexao);
	$contrato = $contratoDao->buscaContrato($contrato_id);
	$contratoDao->removeProjeto($contrato);
	$contratoDao->remove($contrato);
	header("Location: ../views/contratos.php");
?>