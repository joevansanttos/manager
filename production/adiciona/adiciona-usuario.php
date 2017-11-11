<?php
	require_once "../views/conexao.php";
	require_once "../factory/UsuarioFactory.php";
	require_once "../dao/UsuarioDao.php";
	require_once "../class/Bcrypt.php";
	
	if($_FILES["image"]["tmp_name"] != null){
		$image_tmp = getimagesize($_FILES["image"]["tmp_name"]);
		if($image_tmp !== false){
			$image_name = $_FILES['image']['name'];
			$image_path = '../upload/' . $_FILES['image']['name'];		
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			chmod($image_path, 0777);
			$_POST['image'] = $image_path;
		}
	}	

	$hash = Bcrypt::hash($_POST['senha']);
	$_POST['senha'] = $hash;
	$factory = new UsuarioFactory();
	$usuario = $factory->criaUsuario($_POST);
	$usuarioDao = new UsuarioDao($conexao);
	$usuarioDao->insereUsuario($usuario);
	header("Location: ../views/usuarios.php");
?>