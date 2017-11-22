<?php
	require_once "../views/conexao.php";
	require_once "../factory/RelatorioFactory.php";
	require_once "../dao/RelatorioDao.php";
	require_once "../dao/TarefaContratoDao.php";
	
	$factory = new RelatorioFactory();
	$relatorio = $factory->criaRelatorio($_POST);
	$relatorioDao = new RelatorioDao($conexao);
	$id = $relatorio->getTarefaContrato()->getDepartamentoContrato()->getContrato()->getNumero();
	$relatorio = $relatorioDao->insereRelatorio($relatorio);
	header("Location: ../views/detalhes-projeto.php?id=$id");
?>