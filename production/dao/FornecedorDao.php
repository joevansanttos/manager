<?php
	require_once "../factory/FornecedorFactory.php";
	
	class FornecedorDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaFornecedores() {
			$fornecedores = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from fornecedores");			
			while($fornecedor_array = mysqli_fetch_assoc($resultado)) {
				$factory = new FornecedorFactory();
				$id = $fornecedor_array['id'];				
				$fornecedor = $factory->criaFornecedor($fornecedor_array);
				$fornecedor->setId($id);
				array_push($fornecedores, $fornecedor);
			}

			return $fornecedores;
		}

		function insereFornecedor(Fornecedor $fornecedor) {
			$query = "insert into fornecedores ( nome, razao, cnpj, endereco, estado, cidade, tel, segmento) values ('{$fornecedor->getNome()}', '{$fornecedor->getRazao()}', '{$fornecedor->getCnpj()}',  '{$fornecedor->getEndereco()}', '{$fornecedor->getEstado()}', '{$fornecedor->getCidade()}',  '{$fornecedor->getTel()}', '{$fornecedor->getSegmento()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}



		function buscaFornecedor($id) {
			$query = "select * from fornecedores where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$fornecedor_buscado = mysqli_fetch_assoc($resultado);
			$id = $fornecedor_buscado['id'];
			$factory = new FornecedorFactory();
			$fornecedor = $factory->criaFornecedor($fornecedor_buscado);
			$fornecedor->setId($id);
			return $fornecedor;
		}

		function buscaCidade($cidade){
			$query = "select  * from cidade where CT_IBGE = '{$cidade}'";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$novaCidade = mysqli_fetch_assoc($resultado);
			return $novaCidade['CT_NOME'];
			
		}

	}	
?>