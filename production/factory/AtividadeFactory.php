<?php 
	require_once "../dao/UsuarioDao.php";
	require_once "../dao/StatusAtividadeDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Atividade.php";

class AtividadeFactory {

	public function criaAtividade($params) {
		$conexao = new Conexao();						
		$delegado_id = $params["delegado_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$delegado = $usuarioDao->buscaUsuario($delegado_id);
		$delegante_id = $params["delegante_id"];
		$delegante = $usuarioDao->buscaUsuario($delegante_id);
		$status_atividade_id = $params["status_atividade_id"];
		$statusAtividadeDao = new StatusAtividadeDao($conexao);
		$statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);
		$descricao = $params["descricao"];
		$inicio = $params["inicio"];
		$fim = $params["fim"];
		$prazo = $params["prazo"];
		$setor = $params["setor"];
		$filial = $params["filial"];
		$importancia = $params["importancia"];
		$observacao = $params["observacao"];
		$objetivo = $params["objetivo"];
		$resultados = $params["resultados"];
		return new Atividade($descricao, $inicio, $fim, $prazo, $setor, $filial, $resultados, $importancia, $observacao, $objetivo, $statusAtividade, $delegante, $delegado);
	}	

}

?>