<?php
	require_once "../views/conexao.php";
	require_once "../dao/ProdutoDao.php";

	$produto_id = $_GET['id'];
	$produtoDao = new ProdutoDao($conexao);
	$produto = $produtoDao->buscaProduto($produto_id);
	$produtoDao->remove($produto);
	header("Location: ../views/atividades.php");
?>