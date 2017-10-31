<?php
	require_once "../factory/SocioFactory.php";
	
	class SocioDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}


		
		function insereSocio(Socio $socio) {
			$query = "insert into socios (nome, cpf, residencia, nacionalidade, profissao, civil , contrato_id) values ('{$socio->getNome()}','{$socio->getCpf()}' ,'{$socio->getResidencia()}' ,'{$socio->getNacionalidade()}' , '{$socio->getProfissao()}', '{$socio->getCivil()}', '{$socio->getContrato()->getNumero()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function listaSocios(Contrato $contrato){
			$socios = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from socios  where contrato_id = '{$contrato->getNumero()}'");
			while($socio_array = mysqli_fetch_assoc($resultado)) {
				$factory = new SocioFactory();
				$socio = $factory->criaSocio($socio_array['nome'], $socio_array['cpf'], $socio_array['residencia'], $socio_array['nacionalidade'], $socio_array['profissao'], $socio_array['civil'], $contrato);
				array_push($socios, $socio);
			}
			return $socios;
		}

		function remove(Socio $socio){
			$query = "delete from socios where id = {$socio->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		
	}
	

?>