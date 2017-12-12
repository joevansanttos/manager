<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaDao.php";
	$contrato_id = $_GET['id'];
	$contratoDao = new ContratoDao($conexao);
	$contrato = $contratoDao->buscaContrato($contrato_id);
	$contrato->setStatusContrato(2);
	$contratoDao->atualizaStatusContrato($contrato);

	if($contrato->getProduto()->getId() == 5){
		header("Location: ../views/consultoria_mapeamento.php");
	}elseif($contrato->getProduto()->getId() == 6){
		header("Location: ../views/consultoria_auditoria.php");
	}else{
		header("Location: ../views/consultoria_universidade.php");
	}

	
?>