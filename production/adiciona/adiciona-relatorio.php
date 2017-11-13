<?php
	require_once "../views/conexao.php";
	require_once "../factory/RelatorioFactory.php";
	require_once "../dao/RelatorioDao.php";
	require_once "../dao/TarefaContratoDao.php";
	$id = $_POST['tarefa_contrato_id'];
	$factory = new RelatorioFactory();
	$relatorio = $factory->criaRelatorio($_POST);
	$relatorioDao = new RelatorioDao($conexao);
	$tarefaContratoDao = new TarefaContratoDao($conexao);
	$tarefaContrato = $tarefaContratoDao->buscaTarefaContrato($id);
	$id = $tarefaContrato->getDepartamentoContrato()->getContrato()->getNumero();
	$relatorio = $relatorioDao->insereRelatorio($relatorio);
	header("Location: ../views/detalhes-projeto.php?id=$id");
?>