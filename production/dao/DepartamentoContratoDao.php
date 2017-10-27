<?php
	require_once "../factory/DepartamentoContratoFactory.php";

	class DepartamentoContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


	function insere(DepartamentoContrato $departamentoContrato) {
		$query = "insert into departamentos_contratos (departamento_id, contrato_id) values ('{$departamentoContrato->getDepartamento()->getId()}', '{$departamentoContrato->getContrato()->getNumero()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function listaDepartamentosContratos($contrato) {
		$departamentosContratos = array();			
		$resultado = mysqli_query($this->conexao->conecta(), "select u.* from departamentos_contratos as u where contrato_id = '{$contrato->getNumero()}'");
		while($d_contrato_array= mysqli_fetch_assoc($resultado)) {
			$departamentoDao = new DepartamentoDao($this->conexao);	
			$departamento_contrato_id = $d_contrato_array['id'];
			$departamento_id = $d_contrato_array['departamento_id'];
			$departamento = $departamentoDao->buscaDepartamento($departamento_id);
			$factory = new DepartamentoContratoFactory();		
			$departamentoContrato = $factory->criaDepartamentoContrato($contrato, $departamento->getId());
			$departamentoContrato->setId($departamento_contrato_id);
			array_push($departamentosContratos, $departamentoContrato);
		}
		return $departamentosContratos;
	}

	function buscaDepartamentoContrato($id) {
		$query = "select * from departamentos_contratos where id = {$id}";
		$resultado = mysqli_query($this->conexao->conecta(), $query);
		$departamento_contrato_buscado = mysqli_fetch_assoc($resultado);
		$departamento_contrato_id = $departamento_contrato_buscado['id'];
		$departamento_id = $departamento_contrato_buscado['departamento_id'];
		$contrato_id = $departamento_contrato_buscado['contrato_id'];
		$contratoDao = new ContratoDao($this->conexao);	
		$contrato = $contratoDao->buscaContrato($contrato_id);
		$factory = new DepartamentoContratoFactory();
		$departamentoContrato = $factory->criaDepartamentoContrato($contrato, $departamento_id);
		$departamentoContrato->setId($departamento_contrato_id);
		return $departamentoContrato;
	}

}

	

?>