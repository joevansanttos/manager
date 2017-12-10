<?php 
	require_once "../dao/RelatorioDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Relatorio.php";
	require_once "../dao/UsuarioDao.php";

class RelatorioFactory {

	public function criaRelatorio($params) {
		$conexao = new Conexao();						
		$tarefa_contrato_id = $params["tarefa_contrato_id"];
		$tarefaContratoDao = new TarefaContratoDao($conexao);
		$tarefaContrato = $tarefaContratoDao->buscaTarefaContrato($tarefa_contrato_id);
		$usuario_id = $params["usuario_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario_id);
		$descricao = $params["descricao"];
		$data = $params["data"];
		return new Relatorio($descricao, $data,  $tarefaContrato, $usuario);
	}	

}

?>