<?php
	require_once "../factory/PagamentoFactory.php";

	class PagoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaPagamentos() {
			$categorias = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from pagamentos as u");
			while($categoria_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PagamentoFactory();
				$categoria_id = $categoria_array['id'];				
				$categoria = $factory->criaPagamento($categoria_array);
				$categoria->setId($categoria_id);
				array_push($categorias, $categoria);
			}
			return $categorias;
		}

		function buscaPagamento($id) {
			$query = "select * from pagamentos where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$categoria_buscada = mysqli_fetch_assoc($resultado);
			$categoria_id = $categoria_buscada['id'];
			$factory = new PagamentoFactory();
			$categoria = $factory->criaPagamento($categoria_buscada);
			$categoria->setId($categoria_id);
			return $categoria;
		}		
	}

?>