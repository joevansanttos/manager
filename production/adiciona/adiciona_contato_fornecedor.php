<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContatoFornecedorFactory.php";
	require_once "../dao/ContatoFornecedorDao.php";
	$factory = new ContatoFornecedorFactory();
	$contatoFornecedor = $factory->cria($_POST);
	$contatoFornecedorDao = new ContatoFornecedorDao($conexao);
	$contatoFornecedorDao->insere($contatoFornecedor);
	header("Location: ../views/financeiro_contatos.php");  	
?>