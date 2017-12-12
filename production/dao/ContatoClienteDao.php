<?php
	require_once "../factory/ContatoClienteFactory.php";
	
	class ContatoClienteDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		
		function insere(ContatoCliente $contatoCliente) {
			$query = "insert into contato_cliente ( nome, endereco, estado, cidade, tel, cpf, market_id, email) values ('{$contatoCliente->getNome()}', '{$contatoCliente->getEndereco()}', '{$contatoCliente->getEstado()}', '{$contatoCliente->getCidade()}',  '{$contatoCliente->getTel()}', '{$contatoCliente->getCpf()}', '{$contatoCliente->getMarket()->getId()}', '{$contatoCliente->getEmail()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}


		function lista() {
			$contatos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from contato_cliente");			
			while($contato_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ContatoClienteFactory();
				$id = $contato_array['id'];				
				$contato = $factory->cria($contato_array);
				$contato->setId($id);
				array_push($contatos, $contato);
			}

			return $contatos;
		}

		function busca($id) {
			$query = "select * from contato_cliente where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$fornecedor_buscado = mysqli_fetch_assoc($resultado);
			$id = $fornecedor_buscado['id'];
			$factory = new ContatoClienteFactory();
			$fornecedor = $factory->cria($fornecedor_buscado);
			$fornecedor->setId($id);
			return $fornecedor;
		}

		function atualiza(ContatoCliente $contatoCliente) {
			$query = "update contato_cliente  set nome = '{$contatoCliente->getNome()}', endereco = '{$contatoCliente->getEndereco()}', estado = '{$contatoCliente->getEstado()}', cidade = '{$contatoCliente->getCidade()}', tel = '{$contatoCliente->getTel()}', cpf = '{$contatoCliente->getCpf()}', market_id = '{$contatoCliente->getMarket()->getId()}', email = '{$contatoCliente->getEmail()}' where id = '{$contatoCliente->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(ContatoCliente $contato){
			$query = "delete from contato_cliente where id = {$contato->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}



	}



		