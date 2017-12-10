<?php
	require_once "../views/conexao.php";
	require_once "../factory/CustoFactory.php";
	require_once "../dao/CustoDao.php";

	$id = $_GET['id'];
	$factory = new CustoFactory();
	$custo = $factory->cria($_POST);

	$custo->setId($id);
	$custoDao = new CustoDao($conexao);
	$custoDao->atualiza($custo);
	header("Location: ../views/financeiro_transacoes.php"); 	


?>