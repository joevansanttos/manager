<?php
	require_once "../factory/ContatoFornecedorFactory.php";
	
	class ContatoFornecedorDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		
		function insere(ContatoFornecedor $contatoFornecedor) {
			$query = "insert into contato_fornecedor ( nome, endereco, estado, cidade, tel, cpf, fornecedor_id, email) values ('{$contatoFornecedor->getNome()}', '{$contatoFornecedor->getEndereco()}', '{$contatoFornecedor->getEstado()}', '{$contatoFornecedor->getCidade()}',  '{$contatoFornecedor->getTel()}', '{$contatoFornecedor->getCpf()}', '{$contatoFornecedor->getFornecedor()->getId()}', '{$contatoFornecedor->getEmail()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}


		function lista() {
			$contatos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from contato_fornecedor");			
			while($contato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContatoFornecedorFactory();
				$id = $contato_array['id'];				
				$contato = $factory->cria($contato_array);
				$contato->setId($id);
				array_push($contatos, $contato);
			}

			return $contatos;
		}



	}



		