<?php
	require_once "../conecta.php";
	require_once "../factory/UsuarioFactory.php";
	require_once "../dao/UsuarioDao.php";

	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->insereUsuario($usuario);
?>