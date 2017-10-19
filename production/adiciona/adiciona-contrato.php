<?php
	require_once "../includes/conecta.php";
	require_once "../factory/ClienteFactory.php";
	require_once "../dao/ClienteDao.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";
	require_once "../factory/DepartamentoContratoFactory.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/SocioDao.php";
	require_once "../factory/SocioFactory.php";

	$market = $_GET['market'];
	$factory = new ContratoFactory();
	$contrato = $factory->criaContrato($_GET, $market);
	$contratoDao = new ContratoDao($conexao);	
	$contratoDao->insereContrato($contrato);

	$factory = new SocioFactory();
	$socios = $_GET['multiple'];
	$cpfs = $_GET['cpf'];
	$residencias = $_GET['residencia'];
	$nacionalidades = $_GET['nacionalidade'];
	$profissoes = $_GET['profissao'];
	$civis = $_GET['civil'];
	$i = 0;
	$size = count($socios);
	while ($i < $size) {
	  $socio = $socios[$i];
	  $cpf = $cpfs[$i];
	  $residencia = $residencias[$i];
	  $nacionalidade = $nacionalidades[$i];
	  $profissao = $profissoes[$i];
	  $civil = $civis[$i];
	  $socio = $factory->criaSocio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato);
	  $socioDao = new SocioDao($conexao);	
	  $socioDao->insereSocio($socio);	   
	  $i++;
	}	
	

?>