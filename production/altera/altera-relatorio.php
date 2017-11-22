<?php
	require_once "../views/conexao.php";
	require_once "../factory/RelatorioFactory.php";
	require_once "../dao/RelatorioDao.php";

	$id = $_GET['id'];
	$factory = new RelatorioFactory();
	$relatorio = $factory->criaRelatorio($_POST);
	$relatorio->setId($id);
	$relatorioDao = new RelatorioDao($conexao);
	$relatorioDao->atualiza($relatorio);
	$id = $relatorio->getTarefaContrato()->getDepartamentoContrato()->getContrato()->getNumero();
	header("Location: ../views/detalhes-projeto.php?id=$id");  	


?>