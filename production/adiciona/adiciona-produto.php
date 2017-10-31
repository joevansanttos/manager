<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ProdutoFactory.php";
	require_once "../dao/ProdutoDao.php";
	$factory = new ProdutoFactory();
	$produto = $factory->criaProduto($_POST);
	$produtoDao = new ProdutoDao($conexao);
	$produto = $produtoDao->insereProduto($produto);
	header("Location: ../tables/produtos.php");  	
?>