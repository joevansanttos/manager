<?php 
	require_once "../class/Conexao.php";
	require_once "../includes/logica.php";
?>

<?php

logout();
$_SESSION["success"] = "Usuário deslogado com sucesso!";
header("Location: ../index.php");

