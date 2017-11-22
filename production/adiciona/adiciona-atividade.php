<?php
	require_once "../views/conexao.php";
	require_once "../factory/AtividadeFactory.php";
	require_once "../dao/AtividadeDao.php";

	$factory = new AtividadeFactory();
	$atividade = $factory->criaAtividade($_POST);
	$atividadeDao = new AtividadeDao($conexao);
	$atividadeDao->insereAtividade($atividade);
	//$atividadeDao->enviaEmail($_POST);

	header("Location: ../views/atividades.php");
?>