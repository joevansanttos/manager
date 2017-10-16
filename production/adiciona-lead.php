<?php
	require_once "conecta.php";
	require_once "class/ClienteFactory.php";
	require_once "class/ClienteDao.php";
	require_once "class/LeadFactory.php";
	require_once "class/LeadDao.php";

	$id_cliente = $_POST['id'];
	$clienteDao = new ClienteDao($conexao);
	$cliente = $clienteDao->buscaMarket($id_cliente);
	$factory = new LeadFactory();
	$lead = $factory->criaLead($_POST);
	$leadDao = new LeadDao($conexao);	
	$leadDao->insereLead($lead);
	header("Location: leads.php");

?>