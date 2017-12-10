<?php
	require_once "../views/conexao.php";
	require_once "../factory/DespesaFactory.php";
	require_once "../dao/DespesaDao.php";

	$id = $_GET['id'];
	$despesaDao = new DespesaDao($conexao);
	$despesa = $despesaDao->buscaDespesa($id);

	if ($_FILES['doc']["tmp_name"] != null) {
	  $image_name = $_FILES['doc']['name'];
	  $image_path = 'upload/' . $_FILES['doc']['name'];		
	  move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  chmod('../' . $image_path, 0777);
	  $_POST['doc'] = $image_path;
	}else{
		$_POST['doc'] = $despesa->getDoc();
	}	


	$factory = new DespesaFactory();
	$despesa = $factory->criaDespesa($_POST);

	$despesa->setId($id);
	$despesaDao = new DespesaDao($conexao);
	$despesaDao->atualiza($despesa);

	header("Location: ../views/financeiro_transacoes.php"); 	


?>