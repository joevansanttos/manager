<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaDao.php";

	$contrato_id = $_GET['id'];
	$contratoDao = new ContratoDao($conexao);
	$contrato = $contratoDao->buscaContrato($contrato_id);
	$contratoDao->removeProjeto($contrato);
	$contratoDao->removeConsultores($contrato);
	$contratoDao->atualizaStatusContrato($contrato);

	header("Location: ../views/contratos.php");
?>