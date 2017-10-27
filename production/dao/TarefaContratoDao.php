<?php
	require_once "../factory/TarefaContratoFactory.php";
	require_once "../factory/TarefaFactory.php";
	require_once "../factory/DepartamentoContratoFactory.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaDao.php";

	class TarefaContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


	function insere(TarefaContrato $tarefaContrato) {
		$query = "insert into tarefas_contrato (departamento_contrato_id, tarefa_id) values ('{$tarefaContrato->getDepartamentoContrato()->getId()}', '{$tarefaContrato->getTarefa()->getId()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function listaTarefasContratos($departamentoContrato) {
		$tarefasContratos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select * from tarefas_contrato  where departamento_contrato_id = '{$departamentoContrato->getId()}'");
		while($t_contrato_array= mysqli_fetch_assoc($resultado)) {
			$departamentoContratoDao = new DepartamentoContratoDao($this->conexao);	
			$t_contrato_id = $t_contrato_array['id'];
			$departamento_contrato_id = $t_contrato_array['departamento_contrato_id'];
			$departamentoContrato = $departamentoContratoDao->buscaDepartamentoContrato($departamento_contrato_id);

			$tarefa_id = $t_contrato_array['tarefa_id'];
			$tarefaDao = new TarefaDao($this->conexao);
			$tarefa = $tarefaDao->buscaTarefa($tarefa_id);
			$factory = new TarefaContratoFactory();		
			$tarefaContrato = $factory->criaTarefaContrato($tarefa, $departamentoContrato);
			$tarefaContrato->setId($t_contrato_id);
			array_push($tarefasContratos, $tarefaContrato);
		}
		return $tarefasContratos;
	}


	

}

	

?>