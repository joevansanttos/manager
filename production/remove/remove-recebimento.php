<?php
	require_once "../views/conexao.php";
	require_once "../dao/RecebimentoDao.php";

	$id = $_GET['id'];
	$recebimentoDao = new RecebimentoDao($conexao);
	$recebimento = $recebimentoDao->buscaRecebimento($id);
	$recebimentoDao->remove($recebimento);
	header("Location: ../views/financeiro_transacoes.php");
?>