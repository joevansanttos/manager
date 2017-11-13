<?php
	require_once "../views/conexao.php";
	require_once "../dao/AtividadeDao.php";

	$atividade_id = $_GET['id'];
	$atividadeDao = new AtividadeDao($conexao);
	$atividade = $atividadeDao->buscaAtividade($atividade_id);
	$atividadeDao->remove($atividade);
	header("Location: ../views/atividades.php");
?>