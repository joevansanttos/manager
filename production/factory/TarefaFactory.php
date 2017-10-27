<?php 
	
	require_once "../class/Tarefa.php";

class TarefaFactory {

	public function criaTarefa($params) {

		$descricao = $params['descricao'];		
		return new Tarefa($descricao);
	}	

}

?>