<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/DespesaFactory.php";
	require_once "../dao/DespesaDao.php";
	$factory = new DespesaFactory();
	$despesa = $factory->criaDespesa($_POST);
	$despesaDao = new DespesaDao($conexao);
	$despesa = $despesaDao->insereDespesa($despesa);
	header("Location: ../tables/transacoes.php");
?>