<?php 
	require_once "../class/Conexao.php";
	require_once "../class/Custo.php";
	require_once "../dao/CategoriaDao.php";
	require_once "../dao/PagamentoDao.php";
	require_once "../dao/PagoDao.php";
	require_once "../dao/UsuarioDao.php";
	require_once "../dao/FilialDao.php";


class CustoFactory {

	public function cria($params) {
		$conexao = new Conexao();						
		$descricao = $params["descricao"];
		$categoria_id = $params["categoria_id"];
		$categoriaDao = new CategoriaDao($conexao);
		$categoria = $categoriaDao->buscaCategoriaCusto($categoria_id);	
		$filial_id = $params["filial_id"];
		$filialDao = new FilialDao($conexao);
		$filial = $filialDao->busca($filial_id);		
		$data = $params["data"];
		$valor = $params["valor"];
		$usuario_id = $params["usuario_id"];
		$usuarioDao = new UsuarioDao($conexao);
		$usuario = $usuarioDao->buscaUsuario($usuario_id);
		$pagamento_id = $params["pagamento_id"];
		$pagamentoDao = new PagamentoDao($conexao);
		$pagamento = $pagamentoDao->buscaPagamento($pagamento_id);
		$pago_id = $params["pago_id"];
		$pagoDao = new PagoDao($conexao);
		$pago = $pagoDao->buscaPago($pago_id);
		return new Custo($data, $descricao,  $valor, $categoria, $pagamento, $pago, $filial, $usuario);
	}	

}

?>