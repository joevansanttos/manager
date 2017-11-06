<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/LeadFactory.php";
	require_once "../dao/LeadDao.php";

	$factory = new LeadFactory();
	$lead = $factory->criaLead($_POST);
	$leadDao = new LeadDao($conexao);	
	$leadDao->insereLead($lead);
	header("Location: ../tables/leads.php");
?>