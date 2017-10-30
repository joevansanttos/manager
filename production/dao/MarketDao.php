<?php
	require_once "../factory/MarketFactory.php";
	
	class MarketDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaMarkets($usuario_id) {
			$markets = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from market as u where usuario_id = {$usuario_id}");
			while($market_array = mysqli_fetch_assoc($resultado)) {
				$factory = new MarketFactory();
				$id = $market_array['id'];				
				$market = $factory->criaMarket($market_array);
				$market->setId($id);
				array_push($markets, $market);
			}

			return $markets;
		}

		function insereMarket(Market $market) {
			$query = "insert into market ( razao, nome, cnpj, site, endereco, estado, cidade, segmento, tel, bairro, porte_id, usuario_id) values ('{$market->getNome()}', '{$market->getRazao()}', '{$market->getCnpj()}', '{$market->getSite()}', '{$market->getEndereco()}', '{$market->getEstado()}', '{$market->getCidade()}', '{$market->getSegmento()}' , '{$market->getTel()}', '{$market->getBairro()}' , '{$market->getPorte()->getId()}', '{$market->getUsuario()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualizaMarket(Market $market) {
			$query = "update market set razao = '{$market->getRazao()}', nome = '{$market->getNome()}' , cnpj = '{$market->getCnpj()}' , site = '{$market->getSite()}' , endereco = '{$market->getEndereco()}', estado = '{$market->getEstado()}', cidade = '{$market->getCidade()}', segmento = '{$market->getSegmento()}', tel = '{$market->getTel()}', bairro = '{$market->getBairro()}', porte_id = '{$market->getPorte()->getId()}' where id = {$market->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaMarket($id) {
			$query = "select * from market where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$market_buscado = mysqli_fetch_assoc($resultado);
			$id_market = $market_buscado['id'];
			$factory = new MarketFactory();
			$cliente = $factory->criaMarket($market_buscado);
			$cliente->setId($id_market);
			return $cliente;
		}

		function buscaCidade($cidade){
			$query = "select  * from cidade where CT_IBGE = '{$cidade}'";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$novaCidade = mysqli_fetch_assoc($resultado);
			return $novaCidade['CT_NOME'];
			
		}
	}
	

?>