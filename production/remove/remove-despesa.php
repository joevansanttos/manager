<?php
	require_once "../views/conexao.php";
	require_once "../dao/DespesaDao.php";

	$id = $_GET['id'];
	$despesaDao = new DespesaDao($conexao);
	$despesa = $despesaDao->buscaDespesa($id);
	$despesaDao->remove($despesa);
	header("Location: ../views/transacoes.php");
?>