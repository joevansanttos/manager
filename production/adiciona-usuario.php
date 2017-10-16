<?php
	require_once "cabecalho.php";
	require_once "class/UsuarioFactory.php";
	require_once "class/UsuarioDao.php";

	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->insereUsuario($usuario);
?>