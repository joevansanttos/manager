<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/SuspectDao.php";

	$factory = new SuspectFactory();
	$suspect = $factory->criaSuspect($_POST);
	$suspectDao = new SuspectDao($conexao);	
	$suspectDao->insereSuspect($suspect);
	header("Location: ../tables/suspects.php");
?>