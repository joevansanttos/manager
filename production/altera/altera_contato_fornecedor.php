<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContatoFornecedorFactory.php";
	require_once "../dao/ContatoFornecedorDao.php";

	$id = $_GET['id'];
	$factory = new ContatoFornecedorFactory();
	$contato = $factory->cria($_POST);
	$contato->setId($id);
	$contatoDao = new ContatoFornecedorDao($conexao);
	$contatoDao->atualiza($contato);
	header("Location: ../views/financeiro_contatos.php"); 	


?>