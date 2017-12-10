<?php
	require_once "../views/conexao.php";
	require_once "../factory/ContatoClienteFactory.php";
	require_once "../dao/ContatoClienteDao.php";
	$factory = new ContatoClienteFactory();
	$contatoCliente = $factory->cria($_POST);
	$contatoClienteDao = new ContatoClienteDao($conexao);
	$contatoClienteDao->insere($contatoCliente);
	header("Location: ../views/financeiro_contatos.php");  	
?>