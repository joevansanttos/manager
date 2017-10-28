<?php
	require_once "../factory/LeadFactory.php";
	
	class LeadDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaLeads() {
			$leads = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from leads as u");
			while($lead_array = mysqli_fetch_assoc($resultado)) {
				$factory = new LeadFactory();
				$lead_id = $lead_array['id'];				
				$lead = $factory->criaLead($lead_array);
				$lead->setId($lead_id);
				array_push($leads, $lead);
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

		
	}
	

?>