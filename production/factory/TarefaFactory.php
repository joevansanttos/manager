<?php 
	require_once "../class/Conexao.php";
	require_once "../class/Tarefa.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/StatusAtividadeDao.php";

class TarefaFactory {

	public function cria($params) {
		$conexao = new Conexao();				
		$descricao = $params['descricao'];
		$departamento_contrato_id = $params["departamento_contrato_id"];
		$departamentoContratoDao = new DepartamentoContratoDao($conexao);
		$departamentoContrato = $departamentoContratoDao->buscaDepartamentoContrato($departamento_contrato_id);
		$fim = $params["fim"];
		$horas = $params["horas"];
		$status_atividade_id = $params["status_atividade_id"];
		$statusAtividadeDao = new StatusAtividadeDao($conexao);
		$statusAtividade = $statusAtividadeDao->buscaStatusAtividade($status_atividade_id);	
		$usuario_id = $params["usuario_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario_id);

		return new Tarefa($departamentoContrato, $horas,  $fim, $descricao, $statusAtividade, $usuario);
	}	

}

?>