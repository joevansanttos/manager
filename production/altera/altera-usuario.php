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

	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false){
	  $image = $_FILES['image']['tmp_name'];
	  $imgContent = addslashes(file_get_contents($image));
	  $usuarioDao->adicionaImagem($imgContent, $usuario);
	     
	}
	header("Location: ../tables/usuarios.php");

?>