<?php
	require_once "../factory/ProspectFactory.php";
	require_once "../dao/MarketDao.php";
	
	class ProspectDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProspects($usuario_id) {
			$prospects = array();
			$marketDao = new MarketDao($this->conexao);
			$markets = $marketDao->listaMarkets($usuario_id);
			foreach ($markets as $market) {
				$market_id = $market->getId();
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from prospects as u where market_id = {$market_id}");
				while($prospect_array = mysqli_fetch_assoc($resultado)) {
					$factory = new ProspectFactory();
					$prospect_id = $prospect_array['id'];				
					$prospect = $factory->criaProspect($prospect_array);
					$prospect->setId($prospect_id);
					array_push($prospects, $prospect);
				}
			}
			

			return $prospects;
		}

		
		function insereProspect(Prospect $prospect) {
			$query = "insert into prospects (market_id, prob, valor_op, valor_est, recebimento, fechamento, produto_id) values ('{$prospect->getMarket()->getId()}','{$prospect->getProb()}' ,'{$prospect->getValorOp()}' ,'{$prospect->getValorEs()}' , '{$prospect->getRecebimento()}', '{$prospect->getFechamento()}', '{$prospect->getProduto()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaProspect($id) {
			$query = "select * from prospects where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$prospect = mysqli_fetch_assoc($resultado);
			$id = $prospect['id'];
			$factory = new ProspectFactory();
			$prospect = $factory->criaProspect($prospect);
			$prospect->setId($id);
			return $prospect;
		}

		
	}
	

?>