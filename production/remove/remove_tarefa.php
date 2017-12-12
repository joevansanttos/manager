<?php
	require_once "../views/conexao.php";
	require_once "../dao/TarefaDao.php";

	$id = $_GET['id'];
	$tarefaDao = new TarefaDao($conexao);
	$tarefa = $tarefaDao->buscaTarefa($id);
	$tarefaDao->remove($tarefa);
	$id = $tarefa->getDepartamentoContrato()->getContrato()->getNumero();
	header("Location: ../views/detalhes_projeto.php?id=$id");
?>