<?php
	require_once "../factory/PlanejamentoDespesaFactory.php";

	class PlanejamentoDespesaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function addDespesas($planejamento) {
			$id = $planejamento->getId();
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_despesas where planejamento_id = '{$id}'");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoDespesaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				$planejamento->addDespesa($recebimento);
			}
			return $planejamento;
		}

		

		function insere(PlanejamentoDespesa $planejamento) {
			$query = "insert into planejamento_despesas ( fornecedor_id, data, descricao, valor, categoria_id, pagamento_id, filial_id, doc) values ('{$planejamento->getFornecedor()->getId()}', '{$planejamento->getData()}', '{$planejamento->getDescricao()}', '{$planejamento->getValor()}', '{$planejamento->getCategoria()->getId()}', '{$planejamento->getPagamento()->getId()}', '{$planejamento->getFilial()->getId()}', '{$planejamento->getDoc()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function busca($id) {
			$query = "select * from planejamento_despesas where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$planejamento_buscado = mysqli_fetch_assoc($resultado);
			$planejamento_id = $planejamento_buscado['id'];
			$factory = new PlanejamentoDespesaFactory();
			$planejamento_despesa = $factory->cria($planejamento_buscado);
			$planejamento_despesa->setId($planejamento_id);
			$planejamentoDao = new PlanejamentoDao($this->conexao);
			$planejamento = $planejamentoDao->busca($planejamento_buscado['planejamento_id']);
			$planejamento_despesa->setPlanejamento($planejamento);
			return $planejamento_despesa;
		}

		function atualiza(PlanejamentoDespesa $planejamento) {
			$query = "update planejamento_despesas set fornecedor_id = '{$planejamento->getFornecedor()->getId()}', data = '{$planejamento->getData()}', descricao = '{$planejamento->getDescricao()}', valor = '{$planejamento->getValor()}', categoria_id = '{$planejamento->getCategoria()->getId()}', pagamento_id = '{$planejamento->getPagamento()->getId()}', filial_id = '{$planejamento->getFilial()->getId()}', doc = '{$planejamento->getDoc()}' where id = '{$planejamento->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(PlanejamentoDespesa $planejamento){
			$query = "delete from planejamento_despesas where id = {$planejamento->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}		

		function calcula($start, $end) {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_despesas where data between '{$start}' and '{$end}'");
			$valor = 0;
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$valor = $valor + $recebimento_array['valor'];
			}
			return $valor;
		}

}
	

?>