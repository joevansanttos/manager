<?php
	require_once "../views/conexao.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";

	$factory = new ProspectFactory();
	$prospect = $factory->criaProspect($_POST);
	$prospectDao = new ProspectDao($conexao);	
	$prospectDao->insereProspect($prospect);
	
	header("Location: ../views/prospects.php");
?>