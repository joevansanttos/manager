<?php
	require_once "../views/conexao.php";
	require_once "../factory/AtividadeFactory.php";
	require_once "../dao/AtividadeDao.php";

	$id = $_GET['id'];
	$factory = new AtividadeFactory();
	$atividade = $factory->criaAtividade($_POST);
	$atividade->setId($id);
	$atividadeDao = new AtividadeDao($conexao);
	$atividadeDao->atualizaAtividade($atividade);

	header("Location: ../views/atividades.php"); 	


?>