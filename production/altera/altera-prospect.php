<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";
	$id = $_GET['id'];
	$factory = new ProspectFactory();
	$prospect = $factory->criaProspect($_POST);
	$prospect->setId($id);
	var_dump($prospect);
	$prospectDao = new ProspectDao($conexao);
	$prospectDao->atualizaProspect($prospect);
	header("Location: ../tables/prospects.php");
?>