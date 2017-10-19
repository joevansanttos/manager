<?php
	require_once "conecta.php";
	require_once "class/ClienteFactory.php";
	require_once "class/ClienteDao.php";
	require_once "class/SuspectFactory.php";
	require_once "class/SuspectDao.php";

	$id_market = $_POST['id'];
	$clienteDao = new ClienteDao($conexao);
	$cliente = $clienteDao->buscaMarket($id_market);
	$factory = new SuspectFactory();
	$suspect = $factory->criaSuspect($_POST);
	$suspectDao = new SuspectDao($conexao);	
	$suspectDao->insereSuspect($suspect);
?>