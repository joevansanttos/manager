<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/UsuarioFactory.php";
	require_once "../dao/UsuarioDao.php";
	$id = $_POST['id'];
	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuario->setId($id);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->atualizaUsuario($usuario);
	header("Location: ../tables/usuarios.php");

?>