<?php
	require_once "../factory/SuspectFactory.php";
	
	class SuspectDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaSuspects() {
			$suspects = array();
			$resultado = mysqli_query($this->conexao, "select u.* from suspects as u");
			while($suspect_array = mysqli_fetch_assoc($resultado)) {
				$factory = new SuspectFactory();
				$suspect_id = $suspect_array['id_suspect'];				
				$suspect = $factory->criaSuspect($suspect_array);
				$suspect->setId($suspect_id);
				array_push($suspects, $suspect);
			}

			return $suspects;
		}

		function insereSuspect(Suspect $suspect) {
			$query = "insert into suspects (id_clientes, nome, email, tel, status, data, hora) values ('{$suspect->getIdCliente()}','{$suspect->getNome()}' ,'{$suspect->getEmail()}' ,'{$suspect->getTel()}' , '{$suspect->getStatus()}', '{$suspect->getData()}', '{$suspect->getHora()}')";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		
	}
	

?>