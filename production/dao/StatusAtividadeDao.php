<?php
	require_once "../factory/StatusAtividadeFactory.php";

	class StatusAtividadeDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaStatusAtividade() {
			$status_atividades = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from status_atividade as u");
			while($status_atividade = mysqli_fetch_assoc($resultado)) {
				$factory = new StatusAtividadeFactory();
				$status_atividade_id = $status_atividade['id'];				
				$status_atividade = $factory->criaStatusAtividade($status_atividade);
				$status_atividade->setId($status_atividade_id);
				array_push($status_atividades, $status_atividade);
			}
			return $status_atividades;
		}

		function buscaStatusAtividade($id) {
			$query = "select * from status_atividade where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$status_buscado = mysqli_fetch_assoc($resultado);
			$status_atividade_id = $status_buscado['id'];
			$factory = new StatusAtividadeFactory();
			$status_atividade = $factory->criaStatusAtividade($status_buscado);
			$status_atividade->setId($status_atividade_id);
			return $status_atividade;
		}		
	}

?>