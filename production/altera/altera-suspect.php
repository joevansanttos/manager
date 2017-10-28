<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/SuspectDao.php";
	$id = $_GET['id'];
	$factory = new SuspectFactory();
	$suspect = $factory->criaSuspect($_POST);
	$suspect->setId($id);
	$suspectDao = new SuspectDao($conexao);
	$suspectDao->atualizaSuspect($suspect);
	header("Location: ../tables/suspects.php");
?>