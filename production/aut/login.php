<?php 
	require "../includes/conecta.php";
	require "../dao/UsuarioDao.php";
	require ("../includes/logica.php");
	ob_start();
	session_start();
	$usuarioDao = new UsuarioDao($conexao);	
	$usuario = $usuarioDao->buscaUsuarioLogar($_POST["email"], $_POST["senha"]);
	if($usuario == null){
		$_SESSION["danger"] = "Usuário ou Senha inválida!";
		header("Location: ../index.php");
	}else{
		$_SESSION["success"] = "Usuário logado com sucesso!";
		logaUsuario($usuario['email']);
   	header("Location: ../index.php");
	}
?>
