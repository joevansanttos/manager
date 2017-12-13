<?php
	require_once "../views/conexao.php";
	require_once "../dao/ContatoFornecedorDao.php";

	$id = $_GET['id'];
	$contatoDao = new ContatoFornecedorDao($conexao);
	$contato = $contatoDao->busca($id);
	$contatoDao->remove($contato);
	header("Location: ../views/financeiro_contatos.php");
?>