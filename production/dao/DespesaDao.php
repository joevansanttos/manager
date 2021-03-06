<?php
	require_once "../factory/DespesaFactory.php";
	require_once "../factory/AtividadeFactory.php";
		require_once "../factory/CustoFactory.php";

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

		function listaNovasDespesas($start, $end) {
			$despesas = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from despesas where data between '{$start}' and '{$end}'");
			while($despesa_array = mysqli_fetch_assoc($resultado)) {
				$factory = new DespesaFactory();
				$despesa_id = $despesa_array['id'];				
				$despesa = $factory->criaDespesa($despesa_array);
				$despesa->setId($despesa_id);
				array_push($despesas, $despesa);
			}
			return $despesas;
		}

		function calculoDespesasMes($today) {
			$mes = date("m",strtotime($today));
			$despesas = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from despesas");
			while($despesa_array = mysqli_fetch_assoc($resultado)) {
				$factory = new DespesaFactory();
				$despesa_id = $despesa_array['id'];				
				$despesa = $factory->criaDespesa($despesa_array);
				$despesa->setId($despesa_id);
				array_push($despesas, $despesa);
			}
			$valor = 0;
			foreach ($despesas as $despesa) {
				$m = date("m",strtotime($despesa->getData()));
				if( $m == $mes){
					$valor = $valor + $despesa->getValor();

				}
			}

			$custos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from custos");
			while($custo_array = mysqli_fetch_assoc($resultado)) {
				$factory = new CustoFactory();
				$custo_id = $custo_array['id'];				
				$custo = $factory->cria($custo_array);
				$custo->setId($custo_id);
				array_push($custos, $custo);
			}
			foreach ($custos as $custo) {
				$m = date("m",strtotime($custo->getData()));
				if( $m == $mes){
					$valor = $valor + $custo->getValor();

				}
			}
			return $valor;
		}

		function insereDespesa(Despesa $despesa) {
			$query = "insert into despesas ( fornecedor_id, data, descricao, valor, categoria_id, pagamento_id, pago_id, filial_id, doc, contrato_id) values ('{$despesa->getFornecedor()->getId()}', '{$despesa->getData()}', '{$despesa->getDescricao()}', '{$despesa->getValor()}', '{$despesa->getCategoria()->getId()}', '{$despesa->getPagamento()->getId()}', '{$despesa->getPago()->getId()}', '{$despesa->getFilial()->getId()}', '{$despesa->getDoc()}', '{$despesa->getContrato()->getNumero()}')";
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

		function atualiza(Despesa $despesa) {
			$query = "update despesas set  data = '{$despesa->getData()}', descricao = '{$despesa->getDescricao()}', valor =  '{$despesa->getValor()}', categoria_id = '{$despesa->getCategoria()->getId()}', pagamento_id = '{$despesa->getPagamento()->getId()}', pago_id = '{$despesa->getPago()->getId()}', doc = '{$despesa->getDoc()}', fornecedor_id = '{$despesa->getFornecedor()->getId()}', contrato_id = '{$despesa->getContrato()->getNumero()}' where id = '{$despesa->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(Despesa $despesa){
			$query = "delete from despesas where id = {$despesa->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function calcula($despesas) {
		$valor = 0;
		foreach ($despesas as $r) {
			$valor = $valor + $r->getValor();
		}
		return $valor;
	}


	}

?>