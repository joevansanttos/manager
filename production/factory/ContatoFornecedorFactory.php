<?php	
	require_once "../class/ContatoFornecedor.php";
	require_once "../dao/FornecedorDao.php";
	require_once "../class/Conexao.php";

	class ContatoFornecedorFactory {

		public function cria($params) {
			$conexao = new Conexao();
			$nome = $params["nome"];
			$estado = $params["estado"];
			$cidade = $params["cidade"];
			$endereco = $params["endereco"];
			$cpf = $params["cpf"];
			$tel = $params["tel"];
			$email = $params["email"];
			$fornecedor_id = $params["fornecedor_id"];
			$fornecedorDao = new FornecedorDao($conexao);
			$fornecedor = $fornecedorDao->buscaFornecedor($fornecedor_id);

			return new ContatoFornecedor ($nome, $endereco, $estado, $cidade, $email, $tel, $cpf,  $fornecedor);
		}	

	}

?>