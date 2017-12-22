<?php
	require_once "../views/conexao.php";
	require_once "../factory/AtividadeFactory.php";
	require_once "../dao/AtividadeDao.php";

	$id = $_GET['id'];
	$factory = new AtividadeFactory();
	if($_POST['status_atividade_id'] == 5){
		date_default_timezone_set('America/Bahia');
		$today= date("Y-m-d");
		if($_POST['status_prazo_id'] == 1){
			$_POST['status_prazo_id'] = 3;
		}
	}
	$atividade = $factory->criaAtividade($_POST);
	$atividade->setId($id);
	$atividadeDao = new AtividadeDao($conexao);
	$atividadeDao->atualizaAtividade($atividade);

	header("Location: ../views/atividades-requiridas.php"); 	


?>