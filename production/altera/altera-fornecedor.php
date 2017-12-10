<?php
	require_once "../views/conexao.php";
	require_once "../factory/FornecedorFactory.php";
	require_once "../dao/FornecedorDao.php";
	$id = $_GET['id'];
	$factory = new FornecedorFactory();
	$fornecedor = $factory->criaFornecedor($_POST);
	$fornecedor->setId($id);
	$fornecedorDao = new FornecedorDao($conexao);
	$fornecedorDao->atualizaFornecedor($fornecedor);
	header("Location: ../views/fornecedores.php");  	


?>