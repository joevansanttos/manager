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

		function busca($id) {
			$query = "select * from contato_fornecedor where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$fornecedor_buscado = mysqli_fetch_assoc($resultado);
			$id = $fornecedor_buscado['id'];
			$factory = new ContatoFornecedorFactory();
			$fornecedor = $factory->cria($fornecedor_buscado);
			$fornecedor->setId($id);
			return $fornecedor;
		}

		function atualiza(ContatoFornecedor $contatoCliente) {
			$query = "update contato_fornecedor  set nome = '{$contatoCliente->getNome()}', endereco = '{$contatoCliente->getEndereco()}', estado = '{$contatoCliente->getEstado()}', cidade = '{$contatoCliente->getCidade()}', tel = '{$contatoCliente->getTel()}', cpf = '{$contatoCliente->getCpf()}', fornecedor_id = '{$contatoCliente->getFornecedor()->getId()}', email = '{$contatoCliente->getEmail()}' where id = '{$contatoCliente->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(ContatoFornecedor $contato){
			$query = "delete from contato_fornecedor where id = {$contato->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}



	}



		