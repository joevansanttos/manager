<?php
	require_once "../views/conexao.php";
	require_once "../factory/MensagemFactory.php";
	require_once "../dao/MensagemDao.php";

	$factory = new MensagemFactory();
	$mensagem = $factory->criaMensagem($_POST);
	$mensagemDao = new MensagemDao($conexao);
	$mensagemDao->insereMensagem($mensagem);
	
	header("Location: ../views/usuarios.php");
?>