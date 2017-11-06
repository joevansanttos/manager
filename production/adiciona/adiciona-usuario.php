<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/UsuarioFactory.php";
	require_once "../dao/UsuarioDao.php";

	$image_tmp = getimagesize($_FILES["image"]["tmp_name"]);
	if($image_tmp !== false){
		$image_name = $_FILES['image']['name'];
		$image_path = '../upload/' . $_FILES['image']['name'];		
		move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
		chmod($image_path, 0777);
		$usuario->setImage($image_path);
		$_POST['image'] = $image_path;
	}

	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->insereUsuario($usuario);
	header("Location: ../tables/usuarios.php");
?>