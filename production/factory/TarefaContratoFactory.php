<?php	
	require_once "../class/TarefaContrato.php";
	require_once "../class/DepartamentoContrato.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../class/Tarefa.php";
	require_once "../dao/TarefaDao.php";
	require_once "../class/Conexao.php";

	class TarefaContratoFactory {
		

		public function criaTarefaContrato($tarefa, $departamentoContrato) {	
			$conexao = new Conexao();
			
			return new TarefaContrato($tarefa, $departamentoContrato);
		}	

	}

?>