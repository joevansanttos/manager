<?php
	require_once "../views/conexao.php";
	require_once "../factory/RelatorioFactory.php";
	require_once "../dao/RelatorioDao.php";
	require_once "../dao/TarefaDao.php";
	
	$factory = new RelatorioFactory();
	$relatorio = $factory->criaRelatorio($_POST);
	$relatorioDao = new RelatorioDao($conexao);
	$id = $relatorio->getTarefa()->getDepartamentoContrato()->getContrato()->getNumero();
	$relatorio = $relatorioDao->insereRelatorio($relatorio);
	header("Location: ../views/detalhes_projeto.php?id=$id");
?>