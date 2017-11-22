<?php	
	require_once "../class/Conexao.php";
	require_once "../class/ConsultorProjeto.php";
	require_once "../dao/ContratoDao.php";
	require_once "../dao/UsuarioDao.php";

	class ConsultorProjetoFactory {
		
		public function cria($params) {	
			$conexao = new Conexao();
			$contrato_id = $params["contrato_id"];
			$contratoDao = new ContratoDao($conexao);
			$contrato = $contratoDao->buscaContrato($contrato_id);	
			$consultor_id = $params["consultor_id"];
			$usuarioDao = new UsuarioDao($conexao);
			$consultor = $usuarioDao->buscaUsuario($consultor_id);
			return new ConsultorProjeto($contrato, $consultor);
		}	

	}

?>