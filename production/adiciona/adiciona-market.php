<?php
	require_once "conecta.php";
	require_once "class/ClienteFactory.php";
	require_once "class/ClienteDao.php";

	$id_porte = $_POST['id_porte'];
	$factory = new ClienteFactory();
	$cliente = $factory->criaCliente($_POST);
	$clienteDao = new ClienteDao($conexao);
	$cliente->getPorte()->setId($id_porte);
	$clienteDao->insereMarket($cliente);
	header("Location: market.php");

?>