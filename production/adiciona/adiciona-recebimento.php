<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/RecebimentoFactory.php";
	require_once "../dao/RecebimentoDao.php";
	$factory = new RecebimentoFactory();
	$recebimento = $factory->criaRecebimento($_POST);
	$recebimentoDao = new RecebimentoDao($conexao);
	$recebimento = $recebimentoDao->insereRecebimento($recebimento);
	//header("Location: ../tables/transacoes.php");
?>