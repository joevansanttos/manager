<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/LeadFactory.php";
	require_once "../dao/LeadDao.php";
	require_once "../factory/HistoricoFactory.php";
	require_once "../dao/HistoricoDao.php";

	$factory = new LeadFactory();
	$lead = $factory->criaLead($_POST);
	$leadDao = new LeadDao($conexao);	
	$leadDao->insereLead($lead);
	if($_POST['descricao'] != null){
		$today = date("d.m.y");
		$_POST['data'] = $today;
		$factory = new HistoricoFactory();
		$historico = $factory->criaHistorico($_POST);
		$historicoDao = new HistoricoDao($conexao);
		$historico = $historicoDao->insereHistorico($historico);
	}
	header("Location: ../tables/leads.php");
?>