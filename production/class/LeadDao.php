<?php
	require_once "LeadFactory.php";
	
	class LeadDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaLeads() {

			$leads = array();
			$resultado = mysqli_query($this->conexao, "select u.* from leads as u");
			while($lead_array = mysqli_fetch_assoc($resultado)) {
				$factory = new LeadFactory();
				$lead_id = $lead_array['id_lead'];				
				$lead = $factory->criaLead($lead_array);
				$lead->setId($lead_id);
				array_push($leads, $lead);
			}

			return $leads;
		}

		function insereLead(Lead $lead) {
			$query = "insert into leads (id_clientes, nome, email, tel, cargo) values ('{$lead->getIdCliente()}','{$lead->getNome()}' ,'{$lead->getEmail()}' ,'{$lead->getTel()}' , '{$lead->getCargo()}')";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		
	}
	

?>