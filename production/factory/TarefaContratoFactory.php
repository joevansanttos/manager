<?php	
	require_once "../class/TarefaContrato.php";
	require_once "../class/DepartamentoContrato.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../class/Tarefa.php";
	require_once "../dao/TarefaDao.php";
	require_once "../class/Conexao.php";
	require_once "../dao/StatusAtividadeDao.php";


	class TarefaContratoFactory {
		

		public function criaTarefaContrato($tarefa, $departamentoContrato, $horas, $fim, $status_atividade_id) {
			$conexao = new Conexao();	
			$statusAtividadeDao = new StatusAtividadeDao($conexao);
			$statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);				
			return new TarefaContrato($tarefa, $departamentoContrato, $horas, $fim, $statusAtividade);
		}	

	}

?>