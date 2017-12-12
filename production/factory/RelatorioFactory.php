<?php 
	require_once "../dao/RelatorioDao.php";
	require_once "../class/Conexao.php";
	require_once "../class/Relatorio.php";
	require_once "../dao/UsuarioDao.php";
		require_once "../dao/TarefaDao.php";

class RelatorioFactory {

	public function criaRelatorio($params) {
		$conexao = new Conexao();						
		$tarefa_id = $params["tarefa_id"];
		$tarefaDao = new TarefaDao($conexao);
		$tarefa = $tarefaDao->buscaTarefa($tarefa_id);
		$usuario_id = $params["usuario_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario_id);
		$descricao = $params["descricao"];
		$data = $params["data"];
		return new Relatorio($descricao, $data,  $tarefa, $usuario);
	}	

}

?>