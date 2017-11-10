<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/MensagemFactory.php";
	require_once "../dao/MensagemDao.php";
	$factory = new MensagemFactory();
	$mensagem = $factory->criaMensagem($_POST);
	$mensagemDao = new MensagemDao($conexao);
	$mensagem = $mensagemDao->insereMensagem($mensagem);
	//header("Location: ../tables/market.php");
?>