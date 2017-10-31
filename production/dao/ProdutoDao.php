<?php
	require_once "../factory/ProdutoFactory.php";
	
	class ProdutoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaProdutos() {
			$produtos = array();
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from produtos as u");
			while($produto_array = mysqli_fetch_assoc($resultado)) {
				$factory = new ProdutoFactory();
				$produto_id = $produto_array['id'];				
				$produto = $factory->criaProduto($produto_array);
				$produto->setId($produto_id);
				array_push($produtos, $produto);
			}

			return $produtos;
		}

		function buscaProduto($id) {
			$query = "select * from produtos where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$produto = mysqli_fetch_assoc($resultado);
			$produto_id = $produto['id'];
			$factory = new ProdutoFactory();
			$produto = $factory->criaProduto($produto);
			$produto->setId($produto_id);
			return $produto;
		}


		function insereProduto(Produto $produto) {
			$query = "insert into produtos ( nome, descricao, beneficios, entregas, preco) values ('{$produto->getNome()}', '{$produto->getDescricao()}', '{$produto->getBeneficios()}', '{$produto->getEntregas()}', '{$produto->getPreco()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualizaProduto(Produto $produto) {
			$query = "update produtos set  nome = '{$produto->getNome()}', descricao = '{$produto->getDescricao()}', beneficios = '{$produto->getBeneficios()}', entregas = '{$produto->getEntregas()}', preco = '{$produto->getPreco()}' where id= '{$produto->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}				

	}
	

?>