<?php
	require_once "../factory/DepartamentoContratoFactory.php";

	class DepartamentoContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaDepartamentosContrato() {
			$departamentosContrato = array();			
			$resultado = mysqli_query($this->conexao, "select u.* from departamentos_contrato as u");
			while($departamento_c_array = mysqli_fetch_assoc($resultado)) {
				$factory = new DepartamentoContratoFactory();
				$departamento_c_id = $departamento_c_array['id_porte'];				
				$departamentoContrato = $factory->criaDepartamentoContrato($departamento_c_array);
				$departamentoContrato->setId($departamento_c_id);
				array_push($departamentosContrato, $departamentoContrato);
			}
			return $departamentosContrato;
		}

		function buscaPorte($id) {
			$query = "select * from porte where id_porte = {$id}";
			$resultado = mysqli_query($this->conexao, $query);
			$porte_buscado = mysqli_fetch_assoc($resultado);
			$id_porte = $porte_buscado['id_porte'];
			$factory = new PorteFactory();
			$porte = $factory->criaPorte($porte_buscado);
			$porte->setId($id_porte);
			return $porte;
		}		
	}

?>