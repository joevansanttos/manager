<?php
	require_once "../factory/TarefaFactory.php";

	class TarefaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaTarefas($id) {
			$tarefas = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from tarefas where departamento_contrato_id = $id");
			while($tarefa_array = mysqli_fetch_assoc($resultado)) {
				$factory = new TarefaFactory();
				$tarefa_id = $tarefa_array['id'];				
				$tarefa = $factory->cria($tarefa_array);
				$tarefa->setId($tarefa_id);
				array_push($tarefas, $tarefa);
			}
			return $tarefas;
		}

		function buscaTarefa($id) {
			$query = "select * from tarefas where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$tarefa_buscado = mysqli_fetch_assoc($resultado);
			$tarefa_id = $tarefa_buscado['id'];
			$factory = new TarefaFactory();
			$tarefa = $factory->cria($tarefa_buscado);
			$tarefa->setId($tarefa_id);
			return $tarefa;
		}	

		function insere(Tarefa $tarefa) {
			$query = "insert into tarefas (departamento_contrato_id, descricao, status_atividade_id, usuario_id, data) values ('{$tarefa->getDepartamentoContrato()->getId()}', '{$tarefa->getDescricao()}', '{$tarefa->getStatusAtividade()->getId()}', '{$tarefa->getUsuario()->getId()}', '{$tarefa->getData()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(Tarefa $tarefa){
			$query = "delete from tarefas where id = {$tarefa->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

	}

?>