<?php
	require_once "../factory/MensagemFactory.php";

	class MensagemDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		function insereMensagem(Mensagem $mensagem) {
			$query = "insert into mensagens (mensagem, data, statusMensagem, emissor, receptor) values ('{$mensagem->getMensagem()}', '{$mensagem->getData()}',  '{$mensagem->getStatusMensagem()->getId()}', '{$mensagem->getEmissor()->getId()}', '{$mensagem->getReceptor()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

	}

?>