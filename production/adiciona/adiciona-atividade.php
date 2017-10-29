<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/AtividadeFactory.php";
	require_once "../dao/AtividadeDao.php";
	$factory = new AtividadeFactory();
	$atividade = $factory->criaAtividade($_POST);
	$atividadeDao = new AtividadeDao($conexao);
	$atividade = $atividadeDao->insereAtividade($atividade);
	header("Location: ../tables/atividades.php");
?>