<?php
	require_once "../factory/MensagemFactory.php";

	class MensagemDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function insereMensagem(Mensagem $mensagem) {
			$query = "insert into mensagens (mensagem, data, titulo, status_mensagem_id, emissor_id, receptor_id) values ('{$mensagem->getMensagem()}', '{$mensagem->getData()}', '{$mensagem->getTitulo()}', '{$mensagem->getStatusMensagem()->getId()}', '{$mensagem->getEmissor()->getId()}', '{$mensagem->getReceptor()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){
			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaMensagens($usuario_id) {
			$mensagens = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from mensagens where receptor_id = {$usuario_id} order by id");
			while($mensagens_array = mysqli_fetch_assoc($resultado)) {
				$factory = new MensagemFactory();
				$id = $mensagens_array['id'];				
				$mensagem = $factory->criaMensagem($mensagens_array);
				$mensagem->setId($id);
				array_push($mensagens, $mensagem);
			}

			return $mensagens;
		}

	}

?>