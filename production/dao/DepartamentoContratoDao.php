<?php
	require_once "../factory/DepartamentoContratoFactory.php";

	class DepartamentoContratoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


	function insere(DepartamentoContrato $departamentoContrato) {
		$query = "insert into departamentos_contratos (departamento_id, contrato_id) values ('{$departamentoContrato->getDepartamento()->getId()}', '{$departamentoContrato->getContrato()->getNumero()}')";
		if(mysqli_query($this->conexao, $query)){

		}else{
			echo mysqli_error($this->conexao);
		}
	}

}

	

?>