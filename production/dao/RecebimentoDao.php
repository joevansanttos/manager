<?php
	require_once "../factory/RecebimentoFactory.php";

	class RecebimentoDao{
		private $conexao;

		function __construct($conexao) {
			$this->conexao = $conexao;
		}

		function listaRecebimentos() {
			$recebimentos = array();			
			$resultado = mysqli_query($this->conexao->conecta(), "select u.* from recebimentos as u");
			while($recebimento_array = mysqli_fetch_assoc($resultado)) {
				$factory = new AtividadeFactory();
				$recebimento_id = $recebimento_array['id'];				
				$recebimento = $factory->criaAtividade($recebimento_array);
				$recebimento->setId($recebimento_id);
				array_push($recebimentos, $recebimento);
			}
			return $recebimentos;
		}

		function insereRecebimento(Recebimento $recebimento) {
			$query = "insert into recebimentos ( market_id, data, descricao, valor, categoria_id, pagamento_id, pago_id) values ('{$recebimento->getMarket()->getId()}', '{$recebimento->getData()}', '{$recebimento->getDescricao()}', '{$recebimento->getValor()}', '{$recebimento->getCategoria()->getId()}', '{$recebimento->getPagamento()->getId()}', '{$recebimento->getPago()->getId()}')";
			if(mysqli_query($this->conexao->conecta(), $query)){

			}else{
				echo mysqli_error($this->conexao->conecta());
			}
		}
	}

?>