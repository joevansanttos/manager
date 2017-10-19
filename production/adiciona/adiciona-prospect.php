<?php
	require_once "../conecta.php";
	require_once "../factory/ClienteFactory.php";
	require_once "../dao/ClienteDao.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";

	$id_market = $_POST['id_market'];
	$clienteDao = new ClienteDao($conexao);
	$cliente = $clienteDao->buscaMarket($id_market);
	$factory = new ProspectFactory($conexao);
	$prospect = $factory->criaProspect($_POST);
	$prospectDao = new ProspectDao($conexao);	
	$prospectDao->insereProspect($prospect);
?>