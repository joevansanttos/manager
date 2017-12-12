<?php
	require_once "../views/conexao.php";
	require_once "../dao/CustoDao.php";

	$id = $_GET['id'];
	$custoDao = new CustoDao($conexao);
	$custo = $custoDao->busca($id);
	$custoDao->remove($custo);
	header("Location: ../views/financeiro_transacoes.php");
?>