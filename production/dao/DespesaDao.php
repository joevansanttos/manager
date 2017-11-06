<?php
	require_once "../factory/DespesaFactory.php";
	require_once "../factory/AtividadeFactory.php";

	class DespesaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaDespesas() {
			$despesas = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from despesas as u");
			while($despesa_array = mysqli_fetch_assoc($resultado)) {
				$factory = new DespesaFactory();
				$despesa_id = $despesa_array['id'];				
				$despesa = $factory->criaDespesa($despesa_array);
				$despesa->setId($despesa_id);
				array_push($despesas, $despesa);
			}
			return $despesas;
		}

		function insereDespesa(Despesa $despesa) {
			$query = "insert into despesas ( fornecedor, data, descricao, valor, categoria_id, pagamento_id, pago_id) values ('{$despesa->getFornecedor()}', '{$despesa->getData()}', '{$despesa->getDescricao()}', '{$despesa->getValor()}', '{$despesa->getCategoria()->getId()}', '{$despesa->getPagamento()->getId()}', '{$despesa->getPago()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}
	}

?>