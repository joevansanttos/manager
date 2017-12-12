<?php
	require_once "../views/conexao.php";
	require_once "../factory/FornecedorFactory.php";
	require_once "../dao/FornecedorDao.php";
	$factory = new FornecedorFactory();
	$fornecedor = $factory->criaFornecedor($_POST);
	$fornecedorDao = new FornecedorDao($conexao);
	$fornecedor = $fornecedorDao->insereFornecedor($fornecedor);
	header("Location: ../views/financeiro_fornecedores.php");
?>