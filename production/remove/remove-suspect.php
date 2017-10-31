<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/SuspectDao.php";

	$suspect_id = $_GET['id'];
	$suspectDao = new SuspectDao($conexao);
	$suspect = $suspectDao->buscaSuspect($suspect_id);
	$suspectDao->remove($suspect);
	header("Location: ../tables/suspects.php");
?>