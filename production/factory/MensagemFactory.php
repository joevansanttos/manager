<?php 
	require_once "../class/Conexao.php";
	require_once "../class/Mensagem.php";
	require_once "../dao/UsuarioDao.php";
	require_once "../dao/StatusMensagemDao.php";

class MensagemFactory {

	public function criaMensagem($params) {
		$conexao = new Conexao();						
		$mensagem = $params["mensagem"];
		$data = $params["data"];

		$status_mensagem_id = $params["status_mensagem_id"];
		$statusMensagemDao = new StatusMensagemDao($conexao);
		$statusMensagem = $statusMensagemDao->buscaStatusMensagem($status_mensagem_id);

		$emissor_id = $params["emissor_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$emissor = $usuarioDao->buscaUsuario($emissor_id);

		$receptor_id = $params["receptor_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$receptor = $usuarioDao->buscaUsuario($receptor_id);

		return new Mensagem($mensagem, $data, $statusMensagem, $emissor, $receptor);
	}	

}

?>