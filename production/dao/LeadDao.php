<?php
	require_once "../factory/LeadFactory.php";
	require_once "../dao/MarketDao.php";
	
	class LeadDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaLeads($usuario_id) {
			$leads = array();
			$marketDao = new MarketDao($this->conexao);
			$markets = $marketDao->listaMarkets($usuario_id);
			foreach ($markets as $market) {
				$market_id = $market->getId();
				$resultado = mysqli_query($this->conexao->conecta(), "select u.* from leads as u where market_id = {$market_id}");
				while($lead_array = mysqli_fetch_assoc($resultado)) {
					$factory = new LeadFactory();
					$lead_id = $lead_array['id'];				
					$lead = $factory->criaLead($lead_array);
					$lead->setId($lead_id);
					array_push($leads, $lead);
				}
			}		
			
			return $leads;
		}

		function insereLead(Lead $lead) {
			$query = "insert into leads (market_id, nome, email, tel, cargo) values ('{$lead->getMarket()->getId()}','{$lead->getNome()}' ,'{$lead->getEmail()}' ,'{$lead->getTel()}' , '{$lead->getCargo()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaLead($id) {
			$query = "select * from leads where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$lead_buscado = mysqli_fetch_assoc($resultado);
			$id = $lead_buscado['id'];
			$factory = new LeadFactory();
			$lead = $factory->criaLead($lead_buscado);
			$lead->setId($id);
			return $lead;
		}

		function atualizaLead(Lead $lead) {
			$query = "update leads set  nome = '{$lead->getNome()}', email = '{$lead->getEmail()}', tel = '{$lead->getTel()}', cargo =  '{$lead->getCargo()}' where id = '{$lead->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){
			}else{
				echo (mysqli_error($this->conexao->conecta()));
			}


		}


		function remove(Lead $lead){
			$query = "delete from leads where id = {$lead->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function listaLeadsMarket($market_id) {
			$leads = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from leads as u where market_id = {$market_id}");
			while($lead_array = mysqli_fetch_assoc($resultado)) {
				$factory = new LeadFactory();
				$lead_id = $lead_array['id'];				
				$lead = $factory->criaLead($lead_array);
				$lead->setId($lead_id);
				array_push($leads, $lead);
			}
			return $leads;
		}

		
	}
	

?>