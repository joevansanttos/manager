<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";

	$factory = new ProspectFactory();
	$prospect = $factory->criaProspect($_POST);
	$prospectDao = new ProspectDao($conexao);	
	$prospectDao->insereProspect($prospect);
	header("Location: ../tables/prospects.php");
?>