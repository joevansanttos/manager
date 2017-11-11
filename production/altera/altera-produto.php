<?php
	require_once "../views/conexao.php";
	require_once "../factory/ProdutoFactory.php";
	require_once "../dao/ProdutoDao.php";
	$id = $_GET['id'];
	$factory = new ProdutoFactory();
	$produto = $factory->criaProduto($_POST);
	$produto->setId($id);
	$produtoDao = new ProdutoDao($conexao);
	$produtoDao->atualizaProduto($produto);
	header("Location: ../views/produtos.php");  	


?>