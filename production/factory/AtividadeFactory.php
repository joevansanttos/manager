<?php 
	require_once "../dao/UsuarioDao.php";
	require_once "../dao/StatusAtividadeDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Atividade.php";

class AtividadeFactory {

	public function criaAtividade($params) {
		$conexao = new Conexao();						
		$usuario_id = $params["usuario_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario_id);
		$status_atividade_id = $params["status_atividade_id"];
		$statusAtividadeDao = new StatusAtividadeDao($conexao);
		$statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);
		$descricao = $params["descricao"];
		$inicio = $params["inicio"];
		$prazo = $params["prazo"];
		$setor = $params["setor"];
		$filial = $params["filial"];
		$importancia = $params["importancia"];
		$resultados = $params["resultados"];
		return new Atividade($descricao, $inicio, $prazo, $setor, $filial, $resultados, $importancia, $statusAtividade, $usuario);
	}	

}

?>