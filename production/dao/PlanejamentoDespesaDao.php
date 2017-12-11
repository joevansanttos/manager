<?php
	require_once "../factory/PlanejamentoDespesaFactory.php";

	class PlanejamentoDespesaDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function lista() {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select * from planejamento_despesas");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new PlanejamentoDespesaFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->cria($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
		}

		

		function insere(PlanejamentoDespesa $planejamento) {
			$query = "insert into planejamento_despesas ( fornecedor_id, data, descricao, valor, categoria_id, pagamento_id, filial_id, doc, planejamento_id) values ('{$planejamento->getFornecedor()->getId()}', '{$planejamento->getData()}', '{$planejamento->getDescricao()}', '{$planejamento->getValor()}', '{$planejamento->getCategoria()->getId()}', '{$planejamento->getPagamento()->getId()}', '{$planejamento->getFilial()->getId()}', '{$planejamento->getDoc()}', '{$planejamento->getPlanejamento()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}

}
	

?>