<?php
	require_once "../views/conexao.php";
	require_once "../dao/TarefaDao.php";
	require_once "../factory/TarefaFactory.php";

	$factory = new TarefaFactory();
	$tarefa = $factory->cria($_POST);
	$tarefaDao = new TarefaDao($conexao);
	$tarefaDao->insere($tarefa);
	$id = $tarefa->getDepartamentoContrato()->getContrato()->getNumero();
	header("Location: ../views/detalhes_projeto.php?id=$id");
?>