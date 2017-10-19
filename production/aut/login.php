<?php include ("php/bancos/conecta.php");?>
<?php include ("php/bancos/banco-usuario.php");?>
<?php include ("php/logica/logica-usuario.php");?>
<?php
$usuario =  buscaUsuarioLogar($conexao, $_POST["email"], $_POST["senha"]);
if($usuario == null){
	$_SESSION["danger"] = "Usuário ou Senha inválida!";
	header("Location: index.php");

}else{
	$_SESSION["success"] = "Usuário logado com sucesso!";
	logaUsuario($usuario['email']);
    header("Location: index.php");
}

?>
