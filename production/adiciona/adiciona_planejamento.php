<?php
	require_once "../views/conexao.php";
	require_once "../factory/PlanejamentoFactory.php";
	require_once "../dao/PlanejamentoDao.php";


	$factory = new PlanejamentoFactory();
	$despesa = $factory->cria($_POST);
	$despesaDao = new PlanejamentoDao($conexao);
	$despesaDao->insere($despesa);
	header("Location: ../views/financeiro_planejamentos.php");
?>