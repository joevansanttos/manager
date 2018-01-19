<?php
	require_once "../views/conexao.php";
	require_once "../dao/PlanejamentoReceitaDao.php";

	$id = $_GET['id'];
	$planejamentoReceitaDao = new PlanejamentoReceitaDao($conexao);
	$planejamentoReceita = $planejamentoReceitaDao->busca($id);
	$planejamentoReceitaDao->remove($planejamentoReceita);
	$id = $planejamentoReceita->getPlanejamento()->getId();
	header("Location: ../views/financeiro_planejamento_detalhado.php?id=$id");
?>