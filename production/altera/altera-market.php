<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/MarketFactory.php";
	require_once "../dao/MarketDao.php";
	$id = $_GET['id'];
	$factory = new MarketFactory();
	$market = $factory->criaMarket($_POST);
	$market->setId($id);
	$marketDao = new MarketDao($conexao);
	$marketDao->atualizaMarket($market);
	header("Location: ../tables/market.php");  	


?>