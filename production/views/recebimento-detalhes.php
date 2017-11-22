<?php 
  require_once "cabecalho.php"; 
  require_once '../dao/RecebimentoDao.php';
  $id = $_GET['id'];
  $recebimentoDao = new RecebimentoDao($conexao);
  $recebimento = $recebimentoDao->buscaRecebimento($id);
?>

<?php require_once "css.php"; ?> 

<h3>Detalhes da Despesa</h3>

<?php require_once "body.php";  ?>

<?php
  $file = '../' .$recebimento->getDoc();
  $filename = 'filename.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>

<?php 
  require_once "script.php";
?>

<?php
  require_once "rodape.php"; 
?>