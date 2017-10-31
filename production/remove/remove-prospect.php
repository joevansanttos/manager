<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/ProspectDao.php";

	$prospect_id = $_GET['id'];
	$prospectDao = new ProspectDao($conexao);
	$prospect = $prospectDao->buscaProspect($prospect_id);
	$prospectDao->remove($prospect);
	header("Location: ../tables/prospects.php");
?>