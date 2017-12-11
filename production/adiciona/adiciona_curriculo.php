<?php
	require_once "../views/conexao.php";
	require_once "../factory/CurriculoFactory.php";
	require_once "../dao/CurriculoDao.php";

	$factory = new CurriculoFactory();
	$curriculo = $factory->cria($_POST);
	$curriculoDao = new CurriculoDao($conexao);
	$curriculoDao->insere($curriculo);
	header("Location: ../views/rh_curriculos.php");
?>