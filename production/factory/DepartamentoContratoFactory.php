<?php	
	require_once "../class/DepartamentoContrato.php";
	require_once "../class/Departamento.php";
	require_once "../dao/DepartamentoDao.php";


	class DepartamentoContratoFactory {
		

		public function criaDepartamentoContrato($params) {
			$conexao = mysqli_connect("localhost", "root", "", "manager");			
			$id_departamento = $params["departamento"];
			$id_contrato = $params["contrato"];
			$contratoDao = new ContratoDao($conexao);
			$contrato = $contratoDao->buscaContrato($id_contrato);
			$departamentoDao = new DepartamentoDao($conexao);
			$departamento = $departamentoDao->buscaDepartamento($id_departamento);
			return new DepartamentoContrato($contrato, $departamento);
		}	

	}

?>