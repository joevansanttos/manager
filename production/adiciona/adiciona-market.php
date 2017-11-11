<?php
	require_once "../views/conexao.php";
	require_once "../factory/MarketFactory.php";
	require_once "../dao/MarketDao.php";
	$factory = new MarketFactory();
	$market = $factory->criaMarket($_POST);
	$marketDao = new MarketDao($conexao);
	$market = $marketDao->insereMarket($market);
	header("Location: ../views/market.php");  	
?>