<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/DespesaFactory.php";
	require_once "../dao/DespesaDao.php";

	if($_FILES["doc"]["tmp_name"] != null){
		$image_tmp = getimagesize($_FILES["doc"]["tmp_name"]);
		if($image_tmp !== false){
			$image_name = $_FILES['doc']['name'];
			$image_path = '../upload/' . $_FILES['doc']['name'];		
			move_uploaded_file($_FILES['doc']['tmp_name'], $image_path);
			chmod($image_path, 0777);
			$_POST['doc'] = $image_path;
		}
	}

	/*
	$factory = new DespesaFactory();
	$despesa = $factory->criaDespesa($_POST);
	$despesaDao = new DespesaDao($conexao);
	$despesa = $despesaDao->insereDespesa($despesa);
	header("Location: ../tables/transacoes.php");
	*/
?>