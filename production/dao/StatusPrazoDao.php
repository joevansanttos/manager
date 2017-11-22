<?php
	require_once "../factory/StatusPrazoFactory.php";

	class StatusPrazoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		function buscaStatusPrazo($id) {
			$query = "select * from status_prazo where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$status_buscado = mysqli_fetch_assoc($resultado);
			$id = $status_buscado['id'];
			$factory = new StatusPrazoFactory();
			$status_mensagem = $factory->cria($status_buscado);
			$status_mensagem->setId($id);
			return $status_mensagem;
		}		
	}

?>