<?php
	require_once "../factory/StatusMensagemFactory.php";

	class StatusMensagemDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		function buscaStatusMensagem($id) {
			$query = "select * from status_mensagem where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$status_buscado = mysqli_fetch_assoc($resultado);
			$id = $status_buscado['id'];
			$factory = new StatusMensagemFactory();
			$status_mensagem = $factory->criaStatusMensagem($status_buscado);
			$status_mensagem->setId($id);
			return $status_mensagem;
		}		
	}

?>