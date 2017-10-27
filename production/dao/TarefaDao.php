<?php
	require_once "../factory/TarefaFactory.php";

	class TarefaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaTarefas() {
			$tarefas = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from tarefas as u");
			while($tarefa_array = mysqli_fetch_assoc($resultado)) {
				$factory = new TarefaFactory();
				$tarefa_id = $tarefa_array['id'];				
				$tarefa = $factory->criaTarefa($tarefa_array);
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
			$tarefa = $factory->criaTarefa($tarefa_buscado);
			$tarefa->setId($tarefa_id);
			return $tarefa;
		}		
	}

?>