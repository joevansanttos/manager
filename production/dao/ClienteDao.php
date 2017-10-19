<?php
	require_once "../factory/ClienteFactory.php";
	
	class ClienteDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaClientes() {

			$clientes = array();
			$resultado = mysqli_query($this->conexao, "select u.* from market as u");
			while($cliente_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ClienteFactory();
				$cliente_id = $cliente_array['id_market'];				
				$cliente = $factory->criaCliente($cliente_array);
				$cliente->setId($cliente_id);
				array_push($clientes, $cliente);
			}

			return $clientes;
		}

		function insereMarket(Cliente $cliente) {
			$query = "insert into market ( razao, nome, cnpj, site, endereco, estado, cidade, segmento, tel, bairro, id_porte) values ('{$cliente->getNome()}', '{$cliente->getRazao()}', '{$cliente->getCnpj()}', '{$cliente->getSite()}', '{$cliente->getEndereco()}', '{$cliente->getEstado()}', '{$cliente->getCidade()}', '{$cliente->getSegmento()}' , '{$cliente->getTel()}', '{$cliente->getBairro()}' , '{$cliente->getPorte()->getId()}')";
			if(mysqli_query($this->conexao, $query)){

			}else{
				echo mysqli_error($this->conexao);
			}
		}

		function buscaMarket($id) {
			$query = "select * from market where id_market = {$id}";
			$resultado = mysqli_query($this->conexao, $query);
			$market_buscado = mysqli_fetch_assoc($resultado);
			$id_market = $market_buscado['id_market'];
			$factory = new ClienteFactory();
			$cliente = $factory->criaCliente($market_buscado);
			$cliente->setId($id_market);
			return $cliente;
		}
	}
	

?>