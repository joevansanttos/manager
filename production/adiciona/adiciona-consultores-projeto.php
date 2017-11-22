<?php
	require_once "../views/conexao.php";
	require_once "../factory/ConsultorProjetoFactory.php";
	require_once "../dao/ConsultorProjetoDao.php";

	$consultorProjetoDao = new ConsultorProjetoDao($conexao);
	$consultorProjetoDao->remove($_POST['contrato_id']);

	$consultores_array = $_POST['consultores'];
	foreach ($consultores_array as $c) {
		$params = [];
		$params['consultor_id'] = $c;
		$params['contrato_id'] = $_POST['contrato_id'];

		$factory = new ConsultorProjetoFactory();
		$consultorProjeto = $factory->cria($params);
		$consultorProjetoDao = new ConsultorProjetoDao($conexao);
		$consultorProjetoDao->insere($consultorProjeto);
	}

	header("Location: ../views/projetos.php");
