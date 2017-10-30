<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/HistoricoFactory.php";
	require_once "../dao/HistoricoDao.php";
	$factory = new HistoricoFactory();
	$historico = $factory->criaHistorico($_POST);
	$historicoDao = new HistoricoDao($conexao);
	$historico = $historicoDao->insereHistorico($historico);
	header("Location: ../tables/market.php");
?>