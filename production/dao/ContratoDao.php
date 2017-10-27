<?php
	require_once "../factory/ContratoFactory.php";
	
	class ContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaContratos() {
			$contratos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from contratos as u");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContratoFactory();
				$numero = $contrato_array['id'];				
				$contrato = $factory->criaContrato($contrato_array, $contrato_array['market_id']);
				$contrato->setNumero($numero);
				array_push($contratos, $contrato);
			}

			return $contratos;
		}

		
		function insereContrato(Contrato $contrato) {
			$query = "insert into contratos (inicio, fim, id, sede, razao, cnpj, produto_id, market_id) values ('{$contrato->getInicio()}','{$contrato->getFim()}' ,'{$contrato->getNumero()}' ,'{$contrato->getSede()}' , '{$contrato->getRazao()}', '{$contrato->getCnpj()}', '{$contrato->getProduto()->getId()}', '{$contrato->getMarket()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaContrato($id) {
			$query = "select * from contratos where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$contrato_buscado = mysqli_fetch_assoc($resultado);
			$contrato_id = $contrato_buscado['id'];
			$factory = new ContratoFactory();
			$contrato = $factory->criaContrato($contrato_buscado, $contrato_buscado['market_id']);
			$contrato->setNumero($contrato_id);
			return $contrato;
		}

		
	}
	

?>