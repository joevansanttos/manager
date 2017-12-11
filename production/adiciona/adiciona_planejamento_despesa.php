<?php
	require_once "../views/conexao.php";
	require_once "../factory/PlanejamentoDespesaFactory.php";
	require_once "../dao/PlanejamentoDespesaDao.php";

	if ($_FILES) { 
	  if ($_FILES['doc']["tmp_name"] != null) {
	  	$image_name = $_FILES['doc']['name'];
	  	$image_path = 'upload/' . $_FILES['doc']['name'];		
	  	move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  	chmod('../' . $image_path, 0777);
	  	$_POST['doc'] = $image_path;
	  }
	}	

	$factory = new PlanejamentoDespesaFactory();
	$planejamentoReceita = $factory->cria($_POST);
	$planejamentoDao = new PlanejamentoDespesaDao($conexao);
	$planejamentoDao->insere($planejamentoReceita);

	header("Location: ../views/financeiro_planejamentos.php");
?>