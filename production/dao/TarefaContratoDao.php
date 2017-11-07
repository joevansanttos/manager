<?php
	require_once "../factory/TarefaContratoFactory.php";
	require_once "../factory/TarefaFactory.php";
	require_once "../factory/DepartamentoContratoFactory.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaDao.php";
	require_once "../dao/UsuarioDao.php";
	
	class TarefaContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


	function insere(TarefaContrato $tarefaContrato) {
		$query = "insert into tarefas_contrato (departamento_contrato_id, tarefa_id, status_atividade_id) values ('{$tarefaContrato->getDepartamentoContrato()->getId()}', '{$tarefaContrato->getTarefa()->getId()}', '{$tarefaContrato->getStatusAtividade()->getId()}' )";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function remove(TarefaContrato $tarefaContrato) {
		$query = "delete from tarefas_contrato where id = {$tarefaContrato->getId()}";
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
			$horas = $t_contrato_array['horas'];
			$fim = $t_contrato_array['data_fim'];
			$status_atividade_id = $t_contrato_array['status_atividade_id'];
			$usuario_id = $t_contrato_array['usuario_id'];
			$tarefaContrato = $factory->criaTarefaContrato($tarefa, $departamentoContrato, $horas, $fim, $status_atividade_id);
			$usuarioDao = new UsuarioDao($this->conexao);
			if($usuario_id != null){
				$usuario = $usuarioDao->buscaUsuario($usuario_id);
			}else{
				$usuario = null;
			}
			
			$tarefaContrato->setUsuario($usuario);
			$tarefaContrato->setId($t_contrato_id);
			array_push($tarefasContratos, $tarefaContrato);
		}
		return $tarefasContratos;
	}

	function buscaTarefaContrato($id) {
		$query = "select * from tarefas_contrato where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$tarefa_contrato = mysqli_fetch_assoc($resultado);
		$tarefa_contrato_id = $tarefa_contrato['id'];
		$tarefaDao = new TarefaDao($this->conexao);
		$tarefa = $tarefaDao->buscaTarefa($tarefa_contrato['tarefa_id']);
		$departamentoContratoDao = new DepartamentoContratoDao($this->conexao);	
		$departamentoContrato = $departamentoContratoDao->buscaDepartamentoContrato($tarefa_contrato['departamento_contrato_id']);
		$status_atividade_id = $tarefa_contrato['status_atividade_id'];
		$horas = $tarefa_contrato['horas'];
		$fim = $tarefa_contrato['fim'];
		$factory = new TarefaContratoFactory();
		$tarefaContrato = $factory->criaTarefaContrato($tarefa, $departamentoContrato, $horas, $fim, $status_atividade_id );
		$tarefaContrato->setId($tarefa_contrato_id);
		return $tarefaContrato;
	}

	

}

	

?>