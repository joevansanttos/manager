<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContatoClienteFactory.php";
	require_once "../dao/ContatoClienteDao.php";

	$id = $_GET['id'];
	$factory = new ContatoClienteFactory();
	$contato = $factory->cria($_POST);
	$contato->setId($id);
	$contatoDao = new ContatoClienteDao($conexao);
	$contatoDao->atualiza($contato);
	header("Location: ../views/financeiro_contatos.php"); 	


?>