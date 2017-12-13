<?php
	require_once "../factory/PlanejamentoReceitaFactory.php";

	class PlanejamentoReceitaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function lista($id) {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita where planejamento_id = '{$id}'");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoReceitaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
		}

		function busca($id) {
			$query = "select * from planejamento_receita where id = {$id}";
			$resultado = mysqli_query($this->conexao->conecta(), $query);
			$pago_buscado = mysqli_fetch_assoc($resultado);
			$pago_id = $pago_buscado['id'];
			$factory = new PlanejamentoReceitaFactory();
			$pago = $factory->cria($pago_buscado);
			$pago->setId($pago_id);
			return $pago;
		}		
		
		function calculoRecebimentosMes($today) {
			$mes = date("m",strtotime($today));
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from recebimentos");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new RecebimentoFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->criaRecebimento($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			$valor = 0;
			foreach ($recebimentos as $recebimento) {
				$m = date("m",strtotime($recebimento->getData()));
				if( $m == $mes){
					$valor = $valor + $recebimento->getValor();

				}
			}
			return $valor;
		}

		function insere(PlanejamentoReceita $planejamento) {
			$query = "insert into planejamento_receita ( market_id, data, descricao, valor, categoria_id, pagamento_id, filial_id, doc, planejamento_id) values ('{$planejamento->getMarket()->getId()}', '{$planejamento->getData()}', '{$planejamento->getDescricao()}', '{$planejamento->getValor()}', '{$planejamento->getCategoria()->getId()}', '{$planejamento->getPagamento()->getId()}', '{$planejamento->getFilial()->getId()}', '{$planejamento->getDoc()}', '{$planejamento->getPlanejamento()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function atualiza(PlanejamentoReceita $planejamento) {
			$query = "update planejamento_receita set market_id = '{$planejamento->getMarket()->getId()}', data = '{$planejamento->getData()}', descricao = '{$planejamento->getDescricao()}', valor = '{$planejamento->getValor()}', categoria_id = '{$planejamento->getCategoria()->getId()}', pagamento_id = '{$planejamento->getPagamento()->getId()}', filial_id = '{$planejamento->getFilial()->getId()}', doc = '{$planejamento->getDoc()}' where id = '{$planejamento->getId()}'";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

		function remove(PlanejamentoReceita $planejamento){
			$query = "delete from planejamento_receita where id = {$planejamento->getId()}";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

}
	

?>