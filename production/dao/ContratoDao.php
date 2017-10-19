<?php
	require_once "../factory/ContratoFactory.php";
	
	class ContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaContratos() {
			$contratos = array();
			$resultado = mysqli_query($this->conexao, "select u.* from contratos as u");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContratoFactory();
				$numero = $contrato_array['numero'];				
				$contrato = $factory->criaContrato($contrato_array, $contrato_array['market']);
				$contrato->setNumero($numero);
				array_push($contratos, $contrato);
			}

			return $contratos;
		}

		
		function insereContrato(Contrato $contrato) {
			$query = "insert into contratos (inicio, fim, numero, sede, razao, cnpj, produto, market) values ('{$contrato->getInicio()}','{$contrato->getFim()}' ,'{$contrato->getNumero()}' ,'{$contrato->getSede()}' , '{$contrato->getRazao()}', '{$contrato->getCnpj()}', '{$contrato->getProduto()->getId()}', '{$contrato->getMarket()->getId()}')";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		
	}
	

?>