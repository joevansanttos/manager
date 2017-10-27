<?php	
	require_once "../class/DepartamentoContrato.php";
	require_once "../class/Departamento.php";
	require_once "../dao/DepartamentoDao.php";
	require_once "../class/Contrato.php";
	require_once "../dao/ContratoDao.php";
	require_once "../class/Conexao.php";

	class DepartamentoContratoFactory {
		

		public function criaDepartamentoContrato($contrato, $departamento_id) {	
			$conexao = new Conexao();
			$contrato_id = $contrato->getNumero();
			$contratoDao = new ContratoDao($conexao);
			$contrato = $contratoDao->buscaContrato($contrato_id);

			$departamentoDao = new DepartamentoDao($conexao);
			$departamento = $departamentoDao->buscaDepartamento($departamento_id);
			return new DepartamentoContrato($contrato, $departamento);
		}	

	}

?>