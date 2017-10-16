<?php
	require_once "LeadFactory.php";
	
	class ClienteDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
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