<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/HistoricoFactory.php";
	require_once "../dao/HistoricoDao.php";
	$id = $_GET['id'];
	$factory = new HistoricoFactory();
	$historico = $factory->criaHistorico($_POST);
	$historico->setId($id);
	$market_id = $historico->getMarket()->getId();
	$historicoDao = new HistoricoDao($conexao);
	$historicoDao->atualizaHistorico($historico);
	header("Location: ../tables/market-profile.php?id=$market_id"); 	

?>