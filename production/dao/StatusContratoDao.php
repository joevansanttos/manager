<?php
	require_once "../factory/StatusContratoFactory.php";

	class StatusContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaStatusContrato() {
			$status_contratos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from status_contrato as u");
			while($status_contrato = mysqli_fetch_assoc($resultado)) {
				$factory = new StatusContratoFactory();
				$status_contrato_id = $status_contrato['id'];				
				$status_contrato = $factory->criaPorte($status_contrato);
				$status_contrato->setId($status_contrato_id);
				array_push($status_contratos, $status_contrato);
			}
			return $status_contratos;
		}

		function buscaStatusContrato($id) {
			$query = "select * from status_contrato where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$status_buscado = mysqli_fetch_assoc($resultado);
			$status_contrato_id = $status_buscado['id'];
			$factory = new StatusContratoFactory();
			$status_contrato = $factory->criaStatusContrato($status_buscado);
			$status_contrato->setId($status_contrato_id);
			return $status_contrato;
		}		
	}

?>