<?php
	require_once "../views/conexao.php";
	require_once "../factory/DespesaFactory.php";
	require_once "../dao/DespesaDao.php";

	if ($_FILES) { 
	  if ($_FILES['doc']) {
	  	$image_name = $_FILES['doc']['name'];
	  	$image_path = 'upload/' . $_FILES['doc']['name'];		
	  	move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  	chmod('../' . $image_path, 0777);
	  	$_POST['doc'] = $image_path;
	  }
	}	


	$factory = new DespesaFactory();
	$despesa = $factory->criaDespesa($_POST);
	$despesaDao = new DespesaDao($conexao);
	$despesaDao->insereDespesa($despesa);
	header("Location: ../views/transacoes.php");
?>