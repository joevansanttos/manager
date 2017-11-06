<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/UsuarioFactory.php";
	require_once "../dao/UsuarioDao.php";
	$id = $_POST['id'];
	$usuarioDao = new UsuarioDao($conexao);
	$usuario = $usuarioDao->buscaUsuario($id);

	if($_FILES["image"]["tmp_name"] != null){
		$image_tmp = getimagesize($_FILES["image"]["tmp_name"]);
		if($image_tmp !== false){
			$image_name = $_FILES['image']['name'];
			$image_path = '../upload/' . $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			chmod($image_path, 0777);
			$usuario->setImage($image_path);
			$_POST['image'] = $image_path;
		}
	}else{
		$_POST['image'] = $usuario->getImage();
	}
	
	
	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuario->setId($id);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->atualizaUsuario($usuario);

	
	header("Location: ../tables/usuarios.php");

?>