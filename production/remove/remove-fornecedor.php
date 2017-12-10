<?php
	require_once "../views/conexao.php";
	require_once "../dao/FornecedorDao.php";

	$id = $_GET['id'];
	$fornecedorDao = new FornecedorDao($conexao);
	$fornecedor = $fornecedorDao->buscaFornecedor($id);
	$fornecedorDao->remove($fornecedor);
	header("Location: ../views/fornecedores.php");
?>