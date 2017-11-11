<?php
	require_once "../views/conexao.php";
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/SuspectDao.php";
	$id = $_GET['id'];
	$factory = new SuspectFactory();
	$suspect = $factory->criaSuspect($_POST);
	$suspect->setId($id);
	$suspectDao = new SuspectDao($conexao);
	$suspectDao->atualizaSuspect($suspect);
	header("Location: ../views/suspects.php");
?>