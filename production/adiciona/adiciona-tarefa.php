<?php
	require_once "../includes/cabecalho.php";
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/ContratoDao.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaDao.php";
	require_once "../factory/TarefaContratoFactory.php";
	require_once "../dao/TarefaContratoDao.php";

	$contrato_id = $_GET['id'];
	$contratoDao = new ContratoDao($conexao);
	$contrato = $contratoDao->buscaContrato($contrato_id);
	$departamentoContratoDao = new DepartamentoContratoDao($conexao);
	$departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);
	$tarefaDao = new TarefaDao($conexao);
	$tarefas = $tarefaDao->listaTarefas($conexao);
	foreach($departamentosContratos as $departamentoContrato){
		foreach ($tarefas as $tarefa) {
			$factory = new TarefaContratoFactory();
			$tarefaContrato = $factory->criaTarefaContrato($tarefa, $departamentoContrato, null, null, 1);
			$tarefaContratoDao = new TarefaContratoDao($conexao);
			$tarefaContratoDao->insere($tarefaContrato);
		}
	}

	$contrato->setStatusContrato(2);
	$contratoDao->atualizaStatusContrato($contrato);

	header("Location: ../tables/projetos.php");
?>