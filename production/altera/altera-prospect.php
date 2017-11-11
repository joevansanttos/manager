<?php
	require_once "../views/conexao.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";

	$id = $_GET['id'];
	$factory = new ProspectFactory();
	$prospect = $factory->criaProspect($_POST);
	$prospect->setId($id);
	var_dump($prospect);
	$prospectDao = new ProspectDao($conexao);
	$prospectDao->atualizaProspect($prospect);
	
	header("Location: ../views/prospects.php");
?>