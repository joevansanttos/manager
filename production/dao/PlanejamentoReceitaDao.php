<?php
	require_once "../factory/PlanejamentoReceitaFactory.php";

	class PlanejamentoReceitaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function lista() {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_receita");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoReceitaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
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

}
	

?>