<?php
	require_once "../factory/ProspectFactory.php";
	
	class ProspectDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProspects() {
			$prospects = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from prospects as u");
			while($prospect_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProspectFactory();
				$prospect_id = $prospect_array['id_prospect'];				
				$prospect = $factory->criaProspect($prospect_array);
				$prospect->setId($prospect_id);
				array_push($prospects, $prospect);
			}

			return $prospects;
		}

		
		function insereProspect(Prospect $prospect) {
			$query = "insert into prospects (id_market, prob, valor_op, valor_est, recebimento, fechamento, id_produto) values ('{$prospect->getIdCliente()}','{$prospect->getProb()}' ,'{$prospect->getValorOp()}' ,'{$prospect->getValorEs()}' , '{$prospect->getRecebimento()}', '{$prospect->getFechamento()}', '{$prospect->getProduto()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		
	}
	

?>