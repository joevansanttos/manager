<?php
	require_once "../factory/ContratoFactory.php";
	require_once "../dao/SocioDao.php";
	require_once "../factory/SocioFactory.php";
	require_once "../factory/DepartamentoContratoFactory.php";
	require_once "../dao/DepartamentoContratoDao.php";
	require_once "../dao/TarefaContratoDao.php";

	
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
				$contrato = $factory->criaContrato($contrato_array);
				array_push($contratos, $contrato);
			}
			return $contratos;
		}

		function listaTodosContratos() {
			$contratos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from contratos as u ");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContratoFactory();
				$contrato = $factory->criaContrato($contrato_array);
				array_push($contratos, $contrato);
			}
			
			return $contratos;
		}

		function listaContratosPendentes() {
			$contratos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from contratos as u where status_contrato_id = 1");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContratoFactory();
				$contrato = $factory->criaContrato($contrato_array);
				array_push($contratos, $contrato);
			}
			return $contratos;
		}

		function listaContratosAprovados() {
			$contratos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from contratos as u where status_contrato_id = 2");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContratoFactory();
				$contrato = $factory->criaContrato($contrato_array);
				array_push($contratos, $contrato);
			}
			return $contratos;
		}

		
		function insereContrato(Contrato $contrato) {
			$query = "insert into contratos (inicio, fim, id,  produto_id, market_id, status_contrato_id) values ('{$contrato->getInicio()}','{$contrato->getFim()}' ,'{$contrato->getNumero()}' , '{$contrato->getProduto()->getId()}', '{$contrato->getMarket()->getId()}', 1 )";
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
			$contrato = $factory->criaContrato($contrato_buscado);
			$contrato->setNumero($contrato_id);
			return $contrato;
		}

		function insereSocios(Contrato $contrato, $params){
			$factory = new SocioFactory();
			$socios = $params['multiple'];
			$cpfs = $params['cpf'];
			$residencias = $params['residencia'];
			$nacionalidades = $params['nacionalidade'];
			$profissoes = $params['profissao'];
			$civis = $params['civil'];
			$i = 0;
			$size = count($socios);
			while ($i < $size) {
			  $socio = $socios[$i];
			  $cpf = $cpfs[$i];
			  $residencia = $residencias[$i];
			  $nacionalidade = $nacionalidades[$i];
			  $profissao = $profissoes[$i];
			  $civil = $civis[$i];
			  $socio = $factory->criaSocio($socio, $cpf, $residencia, $nacionalidade, $profissao, $civil, $contrato);
			  $socioDao = new SocioDao($this->conexao);	
			  $socioDao->insereSocio($socio);	   
			  $i++;
			}	
		}

		function insereDepartamentos(Contrato $contrato, $params){
			$factory = new DepartamentoContratoFactory();
			$departamentos = $params['my-select']; 
			$i = 0;
			$size = count($departamentos);
			while ($i < $size) {
			   $departamento_id = $departamentos[$i];
			   $departamentoContrato = $factory->criaDepartamentoContrato($contrato, $departamento_id);
			   $departamentoDao = new DepartamentoContratoDao($this->conexao);
			   $departamentoDao->insere($departamentoContrato);  
			   $i++;
			}
		}

		function atualizaStatusContrato(Contrato $contrato) {
			$query = "update contratos set  status_contrato_id = '{$contrato->getStatusContrato()}' where id = '{$contrato->getNumero()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){
			}else{
				echo (mysqli_error($this->conexao->conecta()));
			}

		}

		function removeProjeto(Contrato $contrato){
			$departamentoContratoDao = new DepartamentoContratoDao($this->conexao);
			$departamentosContratos = $departamentoContratoDao->listaDepartamentosContratos($contrato);

			foreach($departamentosContratos as $departamentoContrato){
				$tarefaContratoDao = new TarefaContratoDao($this->conexao);
				$tarefasContratos = $tarefaContratoDao->listaTarefasContratos($departamentoContrato);
				foreach ($tarefasContratos as $tarefaContrato) {
					$tarefaContratoDao->remove($tarefaContrato);
				}
				$departamentoContratoDao->remove($departamentoContrato);
			}

			$contrato->setStatusContrato(1);
		}


		function remove(Contrato $contrato){
			$socioDao = new SocioDao($this->conexao);
			$socios = $socioDao->listaSocios($contrato);
			foreach ($socios as $socio) {
				$socioDao->remove($socio);
			}
			$query = "delete from contratos where id = {$contrato->getNumero()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaSocios($id) {
			$contratos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from socios as u where contrato_id = $id");
			while($contrato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new SocioFactory();
				$contrato = $factory->criaSocio($contrato_array);
				array_push($contratos, $contrato);
			}
			return $contratos;
		}




		
	}
	

?>