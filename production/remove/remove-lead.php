<?php
	require_once "../includes/cabecalho.php";
	require_once "../dao/LeadDao.php";

	$lead_id = $_GET['id'];
	$leadDao = new LeadDao($conexao);
	$lead = $leadDao->buscaLead($lead_id);
	$leadDao->remove($lead);
	header("Location: ../tables/leads.php");
?>