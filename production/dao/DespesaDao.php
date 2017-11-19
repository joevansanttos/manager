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
			$query = "insert into despesas ( fornecedor_id, data, descricao, valor, categoria_id, pagamento_id, pago_id, doc) values ('{$despesa->getFornecedor()->getId()}', '{$despesa->getData()}', '{$despesa->getDescricao()}', '{$despesa->getValor()}', '{$despesa->getCategoria()->getId()}', '{$despesa->getPagamento()->getId()}', '{$despesa->getPago()->getId()}', '{$despesa->getDoc()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function buscaDespesa($id) {
			$query = "select * from despesas where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$despesa_array = mysqli_fetch_assoc($resultado);
			$id = $despesa_array['id'];
			$factory = new DespesaFactory();
			$despesa = $factory->criaDespesa($despesa_array);
			$despesa->setId($id);
			return $despesa;
		}

	}

?>