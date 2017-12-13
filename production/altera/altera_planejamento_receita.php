<?php
	require_once "../views/conexao.php";
	require_once "../factory/PlanejamentoReceitaFactory.php";
	require_once "../dao/PlanejamentoReceitaDao.php";

	$id = $_GET['id'];
	$factory = new PlanejamentoReceitaFactory();
	$planejamentoReceita = $factory->cria($_POST);

	if ($_FILES) { 
	  if ($_FILES['doc']["tmp_name"] != null) {
	  	$image_name = $_FILES['doc']['name'];
	  	$image_path = 'upload/' . $_FILES['doc']['name'];		
	  	move_uploaded_file($_FILES['doc']['tmp_name'], '../' . $image_path);
	  	chmod('../' . $image_path, 0777);
	  	$_POST['doc'] = $image_path;
	  }
	}	

	$planejamentoReceita->setId($id);
	$planejamentoDao = new PlanejamentoReceitaDao($conexao);
	$planejamentoDao->atualiza($planejamentoReceita);

	$id = $planejamentoReceita->getPlanejamento()->getId();
	header("Location: ../views/financeiro_planejamento.php?id=$id");
?>