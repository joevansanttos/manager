<?php
	require_once "../factory/SocioFactory.php";
	
	class SocioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		
		function insereSocio(Socio $socio) {
			$query = "insert into socios (nome, cpf, residencia, nacionalidade, profissao, civil , contrato) values ('{$socio->getNome()}','{$socio->getCpf()}' ,'{$socio->getResidencia()}' ,'{$socio->getNacionalidade()}' , '{$socio->getProfissao()}', '{$socio->getCivil()}', '{$socio->getContrato()->getNumero()}')";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		
	}
	

?>