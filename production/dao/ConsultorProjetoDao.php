<?php
	require_once "../factory/ConsultorProjetoFactory.php";

	class ConsultorProjetoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


	function insere(ConsultorProjeto $consultorProjeto) {
		$query = "insert into consultor_projeto (contrato_id, consultor_id) values ( '{$consultorProjeto->getContrato()->getNumero()}', '{$consultorProjeto->getConsultor()->getId()}')";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function lista($contrato_id) {
		$consultoresProjeto = array();
		$resultado = mysqli_query($this->conexao->conecta(), "select * from consultor_projeto  where contrato_id = '{$contrato_id}'");
		while($consultor_projeto_array = mysqli_fetch_assoc($resultado)) {
			$factory = new ConsultorProjetoFactory();
			$consultorProjeto = $factory->cria($consultor_projeto_array);
			array_push($consultoresProjeto, $consultorProjeto);
		}
		return $consultoresProjeto;
	}


	function remove($contrato_id){
		$query = "delete from consultor_projeto where contrato_id = {$contrato_id}";
		if(mysqli_query($this->conexao->conecta(), $query)){

		}else{
			echo mysqli_error($this->conexao->conecta());
		}
	}

	function busca($usuario_id) {
			$consultoresProjeto = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from consultor_projeto  where consultor_id = '{$usuario_id}'");
			while($consultor_projeto_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ConsultorProjetoFactory();
				$consultorProjeto = $factory->cria($consultor_projeto_array);
				array_push($consultoresProjeto, $consultorProjeto);
			}
			return $consultoresProjeto;
		}

		

}

	

?>