<?php
	require_once "../views/conexao.php";
	require_once "../factory/CustoFactory.php";
	require_once "../dao/CustoDao.php";

	$factory = new CustoFactory();
	$custo = $factory->cria($_POST);
	$custoDao = new CustoDao($conexao);
	$custoDao->insere($custo);
	header("Location: ../views/financeiro_transacoes.php");
?>