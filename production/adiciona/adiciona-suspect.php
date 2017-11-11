<?php
	require_once "../views/conexao.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/SuspectDao.php";

	$factory = new SuspectFactory();
	$suspect = $factory->criaSuspect($_POST);
	$suspectDao = new SuspectDao($conexao);	
	$suspectDao->insereSuspect($suspect);
	
	header("Location: ../views/suspects.php");
?>