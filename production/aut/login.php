<?php 
	require_once "../class/Conexao.php";
	require_once "../dao/UsuarioDao.php";
	require_once "../includes/logica.php";
	
	$conexao = new Conexao();
	ob_start();
	session_start();
	$usuarioDao = new UsuarioDao($conexao);	
	$usuario = $usuarioDao->buscaUsuarioLogar($_POST["email"], $_POST["senha"]);
	if($usuario == null){
		header("Location: ../index.php");
	}else{
		logaUsuario($usuario);
   	header("Location: ../index.php");
	}
?>
