<?php include ("php/bancos/conecta.php");?>
<?php include ("php/logica/logica-usuario.php");?>

<?php

logout();
$_SESSION["success"] = "Usuário deslogado com sucesso!";
header("Location: index.php");

