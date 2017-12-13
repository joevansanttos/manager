<?php
	require_once "../views/conexao.php";
	require_once "../factory/PlanejamentoDespesaFactory.php";
	require_once "../dao/PlanejamentoDespesaDao.php";

	$id = $_GET['id'];
	$factory = new PlanejamentoDespesaFactory();
	$planejamentoDespesa = $factory->cria($_POST);

	if ($_FILES) { 
	  if ($_FILES['doc']["tmp_name"] != null) {
	  	$image_name = $_FILES['doc']['name'];
	  	$image_path = 'upload/' . $_FILES['doc']['name'];		
	  	move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  	chmod('../' . $image_path, 0777);
	  	$_POST['doc'] = $image_path;
	  }
	}	

	$planejamentoDespesa->setId($id);
	$planejamentoDao = new PlanejamentoDespesaDao($conexao);
	$planejamentoDao->atualiza($planejamentoDespesa);

	$id = $planejamentoDespesa->getPlanejamento()->getId();
	header("Location: ../views/financeiro_planejamento.php?id=$id");
?>