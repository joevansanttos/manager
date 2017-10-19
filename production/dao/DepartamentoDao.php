<?php
	require_once "../factory/DepartamentoFactory.php";

	class DepartamentoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaDepartamentos() {
			$departamentos = array();			
			$resultado = mysqli_query($this->conexao, "select u.* from departamentos as u");
			while($departamento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new DepartamentoFactory();
				$departamento_id = $departamento_array['id_departamento'];				
				$departamento = $factory->criaDepartamento($departamento_array);
				$departamento->setId($departamento_id);
				array_push($departamentos, $departamento);
			}
			return $departamentos;
		}
	}

?>