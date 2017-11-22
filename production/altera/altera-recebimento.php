<?php
	require_once "../views/conexao.php";
	require_once "../factory/RecebimentoFactory.php";
	require_once "../dao/RecebimentoDao.php";

	$id = $_GET['id'];
	$recebimentoDao = new RecebimentoDao($conexao);
	$recebimento = $recebimentoDao->buscaRecebimento($id);

	if ($_FILES['doc']["tmp_name"] != null) {
	  $image_name = $_FILES['doc']['name'];
	  $image_path = 'upload/' . $_FILES['doc']['name'];		
	  move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  chmod('../' . $image_path, 0777);
	  $_POST['doc'] = $image_path;
	}else{
		$_POST['doc'] = $recebimento->getDoc();
	}	


	$factory = new RecebimentoFactory();
	$recebimento = $factory->criaRecebimento($_POST);

	$recebimento->setId($id);
	$recebimentoDao = new RecebimentoDao($conexao);
	$recebimentoDao->atualiza($recebimento);

	header("Location: ../views/transacoes.php"); 	


?>