<?php
	require_once "../factory/SuspectFactory.php";
	require_once "../dao/MarketDao.php";
	
	class SuspectDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaSuspects($usuario_id) {
			$suspects = array();
			$marketDao = new MarketDao($this->conexao);
			$markets = $marketDao->listaMarkets($usuario_id);
			foreach ($markets as $market) {
				$market_id = $market->getId();
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from suspects as u where market_id = {$market_id}");
				while($suspect_array = mysqli_fetch_assoc($resultado)) {
					$factory = new SuspectFactory();
					$suspect_id = $suspect_array['id'];				
					$suspect = $factory->criaSuspect($suspect_array);
					$suspect->setId($suspect_id);
					array_push($suspects, $suspect);
				}
			}
			

			return $suspects;
		}

		function insereSuspect(Suspect $suspect) {
			$query = "insert into suspects (market_id, nome, email, tel, status, data, hora) values ('{$suspect->getMarket()->getId()}','{$suspect->getNome()}' ,'{$suspect->getEmail()}' ,'{$suspect->getTel()}' , '{$suspect->getStatus()}', '{$suspect->getData()}', '{$suspect->getHora()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaSuspect($id) {
			$query = "select * from suspects where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$suspect = mysqli_fetch_assoc($resultado);
			$id = $suspect['id'];
			$factory = new SuspectFactory();
			$suspect = $factory->criaSuspect($suspect);
			$suspect->setId($id);
			return $suspect;
		}

		function atualizaSuspect(Suspect $suspect) {
			$query = "update suspects set  nome = '{$suspect->getNome()}', email = '{$suspect->getEmail()}', tel = '{$suspect->getTel()}', status = '{$suspect->getStatus()}', data = '{$suspect->getData()}', hora = '{$suspect->getHora()}' where id = '{$suspect->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){
			}else{
				echo (mysqli_error($this->conexao->conecta()));
			}


		}

		
	}
	

?>