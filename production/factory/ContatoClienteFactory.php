<?php	
	require_once "../class/ContatoCliente.php";
	require_once "../dao/MarketDao.php";
	require_once "../class/Conexao.php";

	class ContatoClienteFactory {

		public function cria($params) {
			$conexao = new Conexao();
			$nome = $params["nome"];
			$estado = $params["estado"];
			$cidade = $params["cidade"];
			$endereco = $params["endereco"];
			$cpf = $params["cpf"];
			$tel = $params["tel"];
			$email = $params["email"];
			$market_id = $params["market_id"];
			$marketDao = new MarketDao($conexao);
			$market = $marketDao->buscaMarket($market_id);

			return new ContatoCliente ($nome, $endereco, $estado, $cidade, $email, $tel, $cpf,  $market);
		}	

	}

?>