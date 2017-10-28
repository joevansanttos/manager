<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/LeadFactory.php";
	require_once "../dao/LeadDao.php";
	$id = $_GET['id'];
	$factory = new LeadFactory();
	$lead = $factory->criaLead($_POST);
	$lead->setId($id);
	$leadDao = new LeadDao($conexao);
	$leadDao->atualizaLead($lead);
	header("Location: ../tables/leads.php");  	
?>